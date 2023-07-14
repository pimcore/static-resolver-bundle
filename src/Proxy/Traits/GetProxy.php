<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Traits;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use ProxyManager\Proxy\RemoteObjectInterface;

trait GetProxy
{

    protected readonly RemoteObjectFactoryInterface $remoteObjectFactory;

    protected function getDecoratorProxy(?string $interface, ?object $innerObject): RemoteObjectInterface|null
    {
        if ($interface === null) {
            return $this->getProxy($innerObject);
        }
        if ($innerObject === null) {
            return null;
        }
        return $this->remoteObjectFactory->createDecoratorProxy($interface, $innerObject);
    }

    protected function getProxy(?object $innerObject): RemoteObjectInterface|null
    {
        if ($innerObject === null) {
            return null;
        }
        return $this->remoteObjectFactory->createObjectProxy($innerObject);
    }
}
