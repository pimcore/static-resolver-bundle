<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote;

use BadMethodCallException;
use ProxyManager\Factory\RemoteObject\AdapterInterface;

interface ObjectAdapterInterface extends AdapterInterface
{
    /** @throws BadMethodCallException */
    public function call(string $wrappedClass, string $method, array $params = []);
}
