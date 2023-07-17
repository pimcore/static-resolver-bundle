<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Traits;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use ProxyManager\Proxy\RemoteObjectInterface;

trait GetProxy
{

    protected readonly RemoteObjectFactoryInterface $remoteObjectFactory;

    protected function buildDecoratorProxy(?string $interface, ?object $innerObject): RemoteObjectInterface|null
    {
        if ($interface === null) {
            return $this->buildObjectProxy($innerObject);
        }
        if ($innerObject === null) {
            return null;
        }
        return $this->remoteObjectFactory->createDecoratorProxy($interface, $innerObject);
    }
    protected function buildStrictDecoratorProxy(string $interface, ?object $innerObject): RemoteObjectInterface|null
    {
        if ($innerObject === null) {
            return null;
        }
        return $this->remoteObjectFactory->createStrictProxy($interface, $innerObject);
    }

    protected function buildObjectProxy(?object $innerObject): RemoteObjectInterface|null
    {
        if ($innerObject === null) {
            return null;
        }
        return $this->remoteObjectFactory->createObjectProxy($innerObject);
    }
}
