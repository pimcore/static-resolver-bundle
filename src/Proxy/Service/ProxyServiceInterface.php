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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

/**
 * @deprecated Will be removed in 3.0
 */
interface ProxyServiceInterface
{
    /** @throws InvalidServiceException */
    public function getProxyObject(string $className, string $method, array $args = []): object|null;

    /** @throws InvalidServiceException */
    public function getStrictProxyObject(
        string $className,
        string $method,
        string $interface,
        array $args = []
    ): object|null;

    /** @throws InvalidServiceException */
    public function getDecoratorProxy(
        string $className,
        string $method,
        ?string $interface = null,
        array $args = []
    ): object|null;
}
