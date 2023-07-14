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

namespace Pimcore\Bundle\StaticResolverBundle\Lib\Cache;

use Pimcore\Cache\RuntimeCache;

class RuntimeCacheResolver implements RuntimeCacheResolverInterface
{
    public function load(string $id): mixed
    {
        return RuntimeCache::load($id);
    }

    public function save(mixed $data, string $id): void
    {
        RuntimeCache::save($data, $id);
    }

    public function isRegistered(string $index): bool
    {
        return RuntimeCache::isRegistered($index);
    }
}
