<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tool;

use Pimcore\Model\Tool\TmpStore;

interface TmpStoreResolverContractInterface
{
    public function get(string $id): ?TmpStore;

    public function delete(string $id): void;

    public function add(string $id, mixed $data, ?string $tag = null, ?int $lifetime = null): bool;

    public function set(string $id, mixed $data, ?string $tag = null, ?int $lifetime = null): bool;

    public function getIdsByTag(string $tag): array;

    public function locateDaoClass(string $modelClass): ?string;
}
