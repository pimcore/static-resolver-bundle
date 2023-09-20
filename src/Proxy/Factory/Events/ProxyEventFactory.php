<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEvent;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEventInterface;

class ProxyEventFactory implements ProxyEventFactoryInterface
{
    public function createProxyEvent(mixed $subject = null, array $arguments = []): ProxyEventInterface
    {
        return new ProxyEvent($subject, $arguments);
    }
}

