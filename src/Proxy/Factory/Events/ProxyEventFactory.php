<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptorInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptorInterface;

class ProxyEventFactory implements ProxyEventFactoryInterface
{
    public function createProxyPreEvent(mixed $subject = null, array $arguments = []): ProxyPreInterceptorInterface
    {
        return new ProxyPreInterceptor($subject, $arguments);
    }

    public function createProxyPostEvent(mixed $subject = null, array $arguments = []): ProxyPostInterceptorInterface
    {
        return new ProxyPostInterceptor($subject, $arguments);
    }
}
