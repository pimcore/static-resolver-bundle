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

final class TmpStoreResolver implements TmpStoreResolverInterface
{
    public function add(string $id, mixed $data, ?string $tag = null, ?int $lifetime = null): bool
    {
        return TmpStore::add($id, $data, $tag, $lifetime);
    }

    public function get(string $id): ?TmpStore
    {
        return TmpStore::get($id);
    }

    public function delete(string $id): void
    {
        TmpStore::delete($id);
    }

    public function getIdsByTag(string $tag): array
    {
        return TmpStore::getIdsByTag($tag);
    }

    public function set(string $id, mixed $data, ?string $tag = null, ?int $lifetime = null): bool
    {
        return TmpStore::set($id, $data, $tag, $lifetime);
    }
}
