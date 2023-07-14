<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote;

use BadMethodCallException;
use InvalidArgumentException;
use ProxyManager\Factory\RemoteObject\AdapterInterface;

class StrictObjectAdapter implements ObjectAdapterInterface
{

    public function __construct(private readonly object $remoteClassOrInstance, private readonly string $interface)
    {
        if (!interface_exists($interface)) {
            throw new InvalidArgumentException(sprintf('Interface %s does not exist', $interface));
        }

        if (!$this->remoteClassOrInstance instanceof $this->interface && !$this->checkInterfaceMethods()) {
            throw new InvalidArgumentException(
                sprintf('Remote class or instance must implement %s', $this->interface)
            );
        }
    }

    /** @throws BadMethodCallException */
    public function call(string $wrappedClass, string $method, array $params = [])
    {
        return $this->remoteClassOrInstance->{$method}(...$params);
    }

    private function checkInterfaceMethods(): bool
    {
        foreach (get_class_methods($this->interface) as $method) {
            if (!method_exists($this->remoteClassOrInstance, $method)) {
                return false;
            }
        }

        return true;
    }
}
