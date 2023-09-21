<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptorInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptorInterface;

interface ProxyEventFactoryInterface
{
    public function createProxyPreEvent(mixed $subject = null, array $arguments = []): ProxyPreInterceptorInterface;

    public function createProxyPostEvent(mixed $subject = null, array $arguments = []): ProxyPostInterceptorInterface;
}
