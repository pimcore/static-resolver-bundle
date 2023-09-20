<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEventInterface;

interface ProxyEventFactoryInterface
{
    public function createProxyEvent(mixed $subject = null, array $arguments = []): ProxyEventInterface;
}
