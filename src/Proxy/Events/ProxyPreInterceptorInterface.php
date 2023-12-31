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
