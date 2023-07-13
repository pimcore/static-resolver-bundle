<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject;

use InvalidArgumentException;
use ProxyManager\Proxy\RemoteObjectInterface;

interface RemoteObjectFactoryInterface
{
    /** @throws InvalidArgumentException */
    public function createStrictProxy(string $interface, object $remote): RemoteObjectInterface;

    /** @throws InvalidArgumentException */
    public function createObjectProxy(object $remote): RemoteObjectInterface;

    public function createDecoratorProxy(string $interface, object $remote): RemoteObjectInterface;
}
