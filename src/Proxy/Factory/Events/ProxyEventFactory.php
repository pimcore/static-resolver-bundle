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

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEvent;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEventInterface;

/**
 * @deprecated
 */
class ProxyEventFactory implements ProxyEventFactoryInterface
{
    public function createProxyEvent(mixed $subject = null, array $arguments = []): ProxyEventInterface
    {
        return new ProxyEvent($subject, $arguments);
    }
}
