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

/**
 * @deprecated Will be removed in 3.0
 */
interface ProxyPreInterceptorInterface
{
    public function getResponse(): mixed;

    /**
     * @throws ReflectionException
     * @throws InvalidArgumentException
     */
    public function setResponse(mixed $response): bool;

    public function hasResponse(): bool;

    public function lockResponse(): void;

    public function isResponseLocked(): bool;

    public function getMethodArguments(): array;

    public function agrumentExists(string $key): bool;

    public function getMethodArgument(string $key): mixed;

    public function getReturnValue(): mixed;
}
