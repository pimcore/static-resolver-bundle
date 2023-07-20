<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Traits\GetProxy;
use Throwable;

class ProxyService implements ProxyServiceInterface
{
    use GetProxy;

    public function __construct(
        RemoteObjectFactoryInterface $remoteObjectFactory
    )
    {
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
        array  $args = []
    ): object|null
    {
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
        array  $args = []
    ): object|null
    {
        try {
            return $this->buildDecoratorProxy($interface, call_user_func_array([$className, $method], $args));
        } catch (Throwable $exception) {
            throw new InvalidServiceException($exception->getMessage());
        }
    }
}
