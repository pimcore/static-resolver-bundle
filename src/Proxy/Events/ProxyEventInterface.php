<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

interface ProxyEventInterface
{
    public function getResponse(): mixed;

    /**
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     */
    public function setResponse(mixed $response): void;

    public function hasResponse(): bool;
}
