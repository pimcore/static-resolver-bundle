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

    public function addClearTagOnShutdown(string $tag): void;

    public function addIgnoredTagOnSave(string $tag): void;

    public function removeIgnoredTagOnSave(string $tag): void;

    public function addIgnoredTagOnClear(string $tag): void;

    public function removeIgnoredTagOnClear(string $tag): void;

    public function setForceImmediateWrite(bool $force): void;

    public function getForceImmediateWrite(): bool;
}
