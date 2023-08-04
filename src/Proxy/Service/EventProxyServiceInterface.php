<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

interface EventProxyServiceInterface
{
    public function getEventDispatcherProxy(
        object $instance,
        array $preInterceptors = [],
        array $postInterceptors = []
    ): object;
}
