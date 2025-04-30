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
