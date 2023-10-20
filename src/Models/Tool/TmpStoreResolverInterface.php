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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Tool;

use Pimcore\Model\Tool\TmpStore;

interface TmpStoreResolverInterface
{
    public function add(string $id, mixed $data, ?string $tag, ?int $lifetime): bool;

    public function get(string $id): ?TmpStore;

    public function delete(string $id): void;

    public function getIdsByTag(string $tag): array;

    public function set(string $id, mixed $data, ?string $tag = null, ?int $lifetime = null): bool;
}
