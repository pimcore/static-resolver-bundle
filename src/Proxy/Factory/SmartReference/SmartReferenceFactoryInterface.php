<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference;

interface SmartReferenceFactoryInterface
{
    public function createProxy(object $instance): object;
}
