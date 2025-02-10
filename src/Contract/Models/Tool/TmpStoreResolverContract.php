<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tool;

use Pimcore\Model\Tool\TmpStore;

class TmpStoreResolverContract implements TmpStoreResolverContractInterface
{

    public function get(string $id): ?TmpStore
    {
        return TmpStore::get($id);
    }

    public function delete(string $id): void
    {
        TmpStore::delete($id);
    }

    public function add(string $id, mixed $data, ?string $tag = null, ?int $lifetime = null): bool
    {
        return TmpStore::add($id, $data, $tag, $lifetime);
    }

    public function set(string $id, mixed $data, ?string $tag = null, ?int $lifetime = null): bool
    {
        return TmpStore::set($id, $data, $tag, $lifetime);
    }

    public function getIdsByTag(string $tag): array
    {
        return TmpStore::getIdsByTag($tag);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return TmpStore::locateDaoClass($modelClass);
    }
}
