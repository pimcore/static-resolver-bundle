<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptorInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptorInterface;

/**
 * @internal
 *
 * @deprecated Will be removed in 3.0
 */
final class InterceptorInterceptorProxyEventFactory implements InterceptorProxyEventFactoryInterface
{
    public function createInterceptorPreEvent(
        mixed $subject = null, array $arguments = []
    ): ProxyPreInterceptorInterface {
        return new ProxyPreInterceptor($subject, $arguments);
    }

    public function createInterceptorPostEvent(
        mixed $subject = null, array $arguments = []
    ): ProxyPostInterceptorInterface {
        return new ProxyPostInterceptor($subject, $arguments);
    }
}
