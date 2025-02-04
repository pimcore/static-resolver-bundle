<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use DateInterval;

interface CacheResolverContractInterface
{

    public function load(string $key): mixed;

    public function remove(string $key): bool;

    public function clearAll(): bool;

    public function clearTag(string $tag): bool;

    public function disable(): void;

    public function save(
        mixed $data,
        string $key,
        array $tags = [],
        DateInterval|int|null $lifetime = null,
        int $priority = 0,
        bool $force = false
    ): void;

    public function isEnabled(): bool;

    public function enable(): void;

    public function clearTags(array $tag = []): bool;
}
