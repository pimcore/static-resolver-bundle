<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

use InvalidArgumentException;
use ReflectionException;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionUnionType;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * @deprecated Will be removed in 3.0
 */
class ProxyEvent extends GenericEvent implements ProxyEventInterface
{
    private mixed $response;

    private bool $hasResponse = false;

    private bool $lockResponse = false;

    public function getResponse(): mixed
    {
        return $this->response;
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

        if ($response === null && $returnType->allowsNull()) {
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
        \ReflectionType|null $returnType
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
