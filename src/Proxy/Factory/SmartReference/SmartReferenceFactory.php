<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference;

use ProxyManager\Factory\AccessInterceptorValueHolderFactory;
use Throwable;

class SmartReferenceFactory implements SmartReferenceFactoryInterface
{
    public function createProxy(object $instance): object
    {
        $factory = new AccessInterceptorValueHolderFactory();
        try {
            return $factory->createProxy($instance);
        } catch (Throwable) {
            return $instance;
        }
    }
}
