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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote;

use BadMethodCallException;

final class ObjectAdapter implements ObjectAdapterInterface
{
    public function __construct(private readonly object $remoteClassOrInstance)
    {
    }

    /** @throws BadMethodCallException */
    public function call(string $wrappedClass, string $method, array $params = [])
    {
        return $this->remoteClassOrInstance->{$method}(...$params);
    }
}
