<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote;

use BadMethodCallException;

final class ObjectAdapter implements ObjectAdapterInterface
{

    public function __construct(private readonly object $remoteClassOrInstance)
    {
    }

    /** @throws BadMethodCallException */
    public function call(string $wrappedClass, string $method, array $params = [])
    {
        return $this->remoteClassOrInstance->{$method}(...$params);
    }
}
