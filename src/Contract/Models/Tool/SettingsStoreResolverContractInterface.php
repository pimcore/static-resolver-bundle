<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tool;

use Exception;
use Pimcore\Model\Tool\SettingsStore;

interface SettingsStoreResolverContractInterface
{
    public function get(string $id, ?string $scope = null): ?SettingsStore;

    public function delete(string $id, ?string $scope = null): int|string;

    /**
     * @throws Exception
     */
    public function set(string $id, float|bool|int|string $data, string $type = 'string', ?string $scope = null): bool;

    public function getIdsByScope(string $scope): array;

    public function locateDaoClass(string $modelClass): ?string;
}
