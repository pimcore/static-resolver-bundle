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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Traits;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use ProxyManager\Proxy\RemoteObjectInterface;

trait GetProxy
{
    protected readonly RemoteObjectFactoryInterface $remoteObjectFactory;

    protected function buildDecoratorProxy(?string $interface, ?object $innerObject): RemoteObjectInterface|null
    {
        if ($interface === null) {
            return $this->buildObjectProxy($innerObject);
        }
        if ($innerObject === null) {
            return null;
        }

        return $this->remoteObjectFactory->createDecoratorProxy($interface, $innerObject);
    }

    protected function buildStrictDecoratorProxy(string $interface, ?object $innerObject): RemoteObjectInterface|null
    {
        if ($innerObject === null) {
            return null;
        }

        return $this->remoteObjectFactory->createStrictProxy($interface, $innerObject);
    }

    protected function buildObjectProxy(?object $innerObject): RemoteObjectInterface|null
    {
        if ($innerObject === null) {
            return null;
        }

        return $this->remoteObjectFactory->createObjectProxy($innerObject);
    }
}
