<?php

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