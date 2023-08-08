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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject;

use InvalidArgumentException;
use ProxyManager\Proxy\RemoteObjectInterface;

interface RemoteObjectFactoryInterface
{
    /** @throws InvalidArgumentException */
    public function createStrictProxy(string $interface, object $remote): RemoteObjectInterface;

    /** @throws InvalidArgumentException */
    public function createObjectProxy(object $remote): RemoteObjectInterface;

    public function createDecoratorProxy(string $interface, object $remote): RemoteObjectInterface;
}
