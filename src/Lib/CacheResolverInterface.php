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

use DateInterval;

interface CacheResolverInterface
{
    public function save(
        mixed $data,
        string $key,
        array $tags = [],
        DateInterval|int $lifetime = null,
        int $priority = 0,
        bool $force = false
    ): void;

    public function load(string $key): mixed;

    public function remove(string $key): bool;

    public function clearAll(): bool;

    public function clearTag(string $tag): bool;

    public function clearTags(array $tag = []): bool;

    public function enable(): void;

    public function isEnabled(): bool;

    public function disable(): void;
}