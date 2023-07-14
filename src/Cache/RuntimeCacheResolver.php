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

namespace Pimcore\Bundle\StaticResolverBundle\Cache;

use Pimcore\Cache\RuntimeCache;

class RuntimeCacheResolver implements RuntimeCacheResolverInterface
{
    public function runtimeCacheLoad(string $key): mixed
    {
        return RuntimeCache::load($key);
    }

    public function runtimeCacheSave(string $key, mixed $data): void
    {
        RuntimeCache::save($key, $data);
    }

    public function runtimeCacheIsRegistered(string $key): bool
    {
        return RuntimeCache::isRegistered($key);
    }
}
