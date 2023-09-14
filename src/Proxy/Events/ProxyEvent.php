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
use ReflectionIntersectionType;
use ReflectionUnionType;
use Symfony\Component\EventDispatcher\GenericEvent;

class ProxyEvent extends GenericEvent implements ProxyEventInterface
{
    private mixed $response;

    private bool $hasResponse = false;

    public function getResponse(): mixed
    {
        return $this->response;
    }

    /**
     * @throws \ReflectionException
     * @throws InvalidArgumentException
     */
    public function setResponse(mixed $response): void
    {
        $this->checkReturnType($response);
        $this->response = $response;
        $this->hasResponse = true;
    }

    public function hasResponse(): bool
    {
        return $this->hasResponse;
    }

    /**
     * @throws \ReflectionException
     * @throws InvalidArgumentException
     */
    private function checkReturnType(mixed $response): void
    {
        $method = (new \ReflectionMethod($this->getSubject(), $this->getArgument('method')));
        if (!$method->hasReturnType()) {
            return;
        }

        $returnType = $method->getReturnType();
        $returnTypeArray = [];
        if ($response === null && $returnType?->allowsNull()) {
            return;
        }
        if ($returnType instanceof ReflectionUnionType || $returnType instanceof ReflectionIntersectionType) {
            foreach ($returnType->getTypes() as $type) {
                $returnTypeArray[] = $type->getName();
            }
        } else {
            $returnTypeArray = [$returnType->getName()];
        }

        if (in_array('mixed', $returnTypeArray, true)) {
            return;
        }
        $returnTypeArray = $this->addSpecialTypes($returnTypeArray);
        $test = get_debug_type($response);
        if (in_array(get_debug_type($response), $returnTypeArray, true)) {
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
}
