<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

interface ProxyServiceInterface
{
    /** @throws InvalidServiceException */
    public function getProxyObject(string $className, string $method, array $args = []): object|null;

    /** @throws InvalidServiceException */
    public function getStrictProxyObject(
        string $className,
        string $method,
        string $interface,
        array  $args = []
    ): object|null;

    /** @throws InvalidServiceException */
    public function getDecoratorProxy(
        string  $className,
        string  $method,
        ?string $interface = null,
        array   $args = []
    ): object|null;
}
