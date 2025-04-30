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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject;

use InvalidArgumentException;
use ProxyManager\Proxy\RemoteObjectInterface;

/**
 * @deprecated Will be removed in 3.0
 */
interface RemoteObjectFactoryInterface
{
    /** @throws InvalidArgumentException */
    public function createStrictProxy(string $interface, object $remote): RemoteObjectInterface;

    /** @throws InvalidArgumentException */
    public function createObjectProxy(object $remote): RemoteObjectInterface;

    public function createDecoratorProxy(string $interface, object $remote): RemoteObjectInterface;
}
