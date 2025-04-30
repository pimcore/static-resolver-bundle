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

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Traits\GetProxy;
use Throwable;

/**
 * @deprecated Will be removed in 3.0
 */
final class ProxyService implements ProxyServiceInterface
{
    use GetProxy;

    public function __construct(
        RemoteObjectFactoryInterface $remoteObjectFactory
    ) {
        $this->remoteObjectFactory = $remoteObjectFactory;
    }

    public function getProxyObject(string $className, string $method, array $args = []): object|null
    {
        try {
            return $this->buildObjectProxy(call_user_func_array([$className, $method], $args));
        } catch (Throwable $exception) {
            throw new InvalidServiceException($exception->getMessage());
        }
    }

    public function getStrictProxyObject(
        string $className,
        string $method,
        string $interface,
        array $args = []
    ): object|null {
        try {
            return $this->buildStrictDecoratorProxy($interface, call_user_func_array([$className, $method], $args));
        } catch (Throwable $exception) {
            throw new InvalidServiceException($exception->getMessage());
        }
    }

    public function getDecoratorProxy(
        string $className,
        string $method,
        ?string $interface = null,
        array $args = []
    ): object|null {
        try {
            return $this->buildDecoratorProxy($interface, call_user_func_array([$className, $method], $args));
        } catch (Throwable $exception) {
            throw new InvalidServiceException($exception->getMessage());
        }
    }
}
