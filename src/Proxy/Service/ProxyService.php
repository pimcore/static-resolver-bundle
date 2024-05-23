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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Traits\GetProxy;
use Throwable;

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
