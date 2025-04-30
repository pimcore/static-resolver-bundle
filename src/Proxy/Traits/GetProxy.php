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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Traits;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use ProxyManager\Proxy\RemoteObjectInterface;

/**
 * @deprecated Will be removed in 3.0
 */
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
