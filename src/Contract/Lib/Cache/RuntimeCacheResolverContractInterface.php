<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Cache;

use Pimcore\Cache\RuntimeCache;

interface RuntimeCacheResolverContractInterface
{
    public function load(string $id): mixed;

    public function save(mixed $data, string $id): void;

    public function isRegistered(string $index): bool;

    public function clear(array $keepItems = []): void;

    /**
     * @throws \Exception
     */
    public function get(string $index): mixed;

    public function set(string $index, mixed $value): void;

    public function enable(): void;

    public function disable(): void;

    public function isEnabled(): bool;

    public function getInstance(): RuntimeCache;
}
