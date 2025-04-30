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
    ): bool;

    public function isEnabled(): bool;

    public function enable(): void;

    public function clearTags(array $tags = []): bool;

    public function addClearTagOnShutdown(string $tag): void;

    public function addIgnoredTagOnSave(string $tag): void;

    public function removeIgnoredTagOnSave(string $tag): void;

    public function addIgnoredTagOnClear(string $tag): void;

    public function removeIgnoredTagOnClear(string $tag): void;

    public function setForceImmediateWrite(bool $forceImmediateWrite): void;

    public function getForceImmediateWrite(): bool;
}
