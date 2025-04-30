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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote;

use BadMethodCallException;
use ProxyManager\Factory\RemoteObject\AdapterInterface;

/**
 * @deprecated Will be removed in 3.0
 */
interface ObjectAdapterInterface extends AdapterInterface
{
    /** @throws BadMethodCallException */
    public function call(string $wrappedClass, string $method, array $params = []): mixed;
}
