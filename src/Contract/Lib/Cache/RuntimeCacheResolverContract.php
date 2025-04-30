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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Cache;

use Pimcore\Cache\RuntimeCache;

class RuntimeCacheResolverContract implements RuntimeCacheResolverContractInterface
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

    public function clear(array $keepItems = []): void
    {
        RuntimeCache::clear($keepItems);
    }

    /**
     * @throws \Exception
     */
    public function get(string $index): mixed
    {
        return RuntimeCache::get($index);
    }

    public function set(string $index, mixed $value): void
    {
        RuntimeCache::set($index, $value);
    }

    public function enable(): void
    {
        RuntimeCache::enable();
    }

    public function disable(): void
    {
        RuntimeCache::disable();
    }

    public function isEnabled(): bool
    {
        return RuntimeCache::isEnabled();
    }

    public function getInstance(): RuntimeCache
    {
        return RuntimeCache::getInstance();
    }
}
