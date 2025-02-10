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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use DateInterval;
use Pimcore\Cache;

class CacheResolverContract implements CacheResolverContractInterface
{
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

    public function disable(): void
    {
        Cache::disable();
    }

    public function save(
        mixed $data,
        string $key,
        array $tags = [],
        DateInterval|int|null $lifetime = null,
        int $priority = 0,
        bool $force = false
    ): bool {
        return Cache::save($data, $key, $tags, $lifetime, $priority, $force);
    }

    public function isEnabled(): bool
    {
        return Cache::isEnabled();
    }

    public function enable(): void
    {
        Cache::enable();
    }

    public function clearTags(array $tags = []): bool
    {
        return Cache::clearTags($tags);
    }

    public function addClearTagOnShutdown(string $tag): void
    {
        Cache::addClearTagOnShutdown($tag);
    }

    public function addIgnoredTagOnSave(string $tag): void
    {
        Cache::addIgnoredTagOnSave($tag);
    }

    public function removeIgnoredTagOnSave(string $tag): void
    {
        Cache::removeIgnoredTagOnSave($tag);
    }

    public function addIgnoredTagOnClear(string $tag): void
    {
        Cache::addIgnoredTagOnClear($tag);
    }

    public function removeIgnoredTagOnClear(string $tag): void
    {
        Cache::removeIgnoredTagOnClear($tag);
    }

    public function setForceImmediateWrite(bool $forceImmediateWrite): void
    {
        Cache::setForceImmediateWrite($forceImmediateWrite);
    }

    public function getForceImmediateWrite(): bool
    {
        return Cache::getForceImmediateWrite();
    }
}
