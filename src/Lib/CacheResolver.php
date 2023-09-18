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

namespace Pimcore\Bundle\StaticResolverBundle\Lib;

use Pimcore\Cache;

class CacheResolver
{
    public function save(mixed $data, string $key, array $tags = []): void
    {
        Cache::save($data, $key, $tags);
    }

    public function load(string $key): mixed
    {
        return Cache::load($key);
    }

    public function remove(string $key): bool
    {
        return Cache::remove($key);
    }

    public function clearAll(): bool
    {
        return Cache::clearAll();
    }

    public function clearTag(string $tag): bool
    {
        return Cache::clearTag($tag);
    }

    public function clearTags(array $tag = []): bool
    {
        return Cache::clearTags($tag);
    }

    public function enable(): void
    {
        Cache::enable();
    }

    public function isEnabled(): bool
    {
        return Cache::isEnabled();
    }

    public function disable(): void
    {
        Cache::disable();
    }
}
