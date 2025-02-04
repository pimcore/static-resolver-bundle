<?php
declare(strict_types=1);

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
    ): void
    {
        Cache::save($data, $key, $tags, $lifetime, $priority, $force);
    }

    public function isEnabled(): bool
    {
        return Cache::isEnabled();
    }

    public function enable(): void
    {
        Cache::enable();
    }

    public function clearTags(array $tag = []): bool
    {
        return Cache::clearTags($tag);
    }
}
