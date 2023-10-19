<?php
declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

use InvalidArgumentException;
use ReflectionException;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionUnionType;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * @internal
 */
final class ProxyPreInterceptor extends Event implements ProxyPreInterceptorInterface
{
    use GetMethodBasics;

    private mixed $response;

    private bool $hasResponse = false;

    private bool $lockResponse = false;

    public function __construct(private readonly mixed $subject = null, private readonly array $arguments = [])
    {
    }

    public function getResponse(): mixed
    {
        return $this->response;
    }

    public function getSubject(): mixed
    {
        return $this->subject;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidArgumentException
     */
    public function setResponse(mixed $response): bool
    {
        if ($this->isResponseLocked()) {
            return false;
        }
        $this->checkReturnType($response);
        $this->response = $response;
        $this->hasResponse = true;

        return true;
    }

    public function hasResponse(): bool
    {
        return $this->hasResponse;
    }

    public function lockResponse(): void
    {
        $this->lockResponse = true;
    }

    public function isResponseLocked(): bool
    {
        return $this->lockResponse;
    }

    private function getArgument(string $key): mixed
    {
        return $this->arguments[$key] ?? null;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidArgumentException
     */
    private function checkReturnType(mixed $response): void
    {
        $method = (new ReflectionMethod($this->getSubject(), $this->getArgument('method')));
        if (!$method->hasReturnType()) {
            return;
        }

        $returnType = $method->getReturnType();

        if ($response === null && $returnType?->allowsNull()) {
            return;
        }

        $returnTypeArray = $this->getTypeArray($returnType);

        if ($this->testForInterface($returnTypeArray, $response) ||
            in_array('mixed', $returnTypeArray, true) ||
            in_array(get_debug_type($response), $returnTypeArray, true)
        ) {
            return;
        }

        throw new InvalidArgumentException(
            sprintf(
                'Return type of method %s::%s is %s, but %s was given',
                $this->getSubject()::class,
                $this->getArgument('method'),
                implode('|', $returnTypeArray),
                get_debug_type($response)
            )
        );
    }

    private function testForInterface(array $returnTypeArray, mixed $response): bool
    {
        foreach ($returnTypeArray as $returnType) {
            if ($response instanceof $returnType) {
                return true;
            }
        }

        return false;
    }

    private function addSpecialTypes(array $returnTypeArray): array
    {
        $specialTypes = [
            'iterable' => 'array',
            'callable' => 'Closure',
        ];
        foreach ($specialTypes as $specialType => $specialTypeReturn) {
            if (in_array($specialType, $returnTypeArray, true)) {
                $returnTypeArray[] = $specialTypeReturn;
            }
        }

        return $returnTypeArray;
    }

    /**
     * @param ReflectionIntersectionType|ReflectionNamedType|ReflectionUnionType|null $returnType
     *
     * @return array
     */
    private function getTypeArray(
        ReflectionIntersectionType|ReflectionNamedType|ReflectionUnionType|null $returnType
    ): array {
        $returnTypeArray = [];
        if ($returnType instanceof ReflectionUnionType || $returnType instanceof ReflectionIntersectionType) {
            foreach ($returnType->getTypes() as $type) {
                $returnTypeArray[] = $type->getName();
            }
        }
        if ($returnType instanceof ReflectionNamedType) {
            $returnTypeArray = [$returnType->getName()];
        }

        return $this->addSpecialTypes($returnTypeArray);
    }
}
