<?php
declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptorInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptorInterface;

final class ProxyEventFactory implements ProxyEventFactoryInterface
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
