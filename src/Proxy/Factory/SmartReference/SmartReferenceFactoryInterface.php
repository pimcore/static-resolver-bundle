<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference;

interface SmartReferenceFactoryInterface
{
    /*
     * @throws Throwable
     */
    public function createProxy(object $instance): object;
}
