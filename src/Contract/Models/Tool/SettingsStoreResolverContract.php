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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tool;

use Exception;
use Pimcore\Model\Tool\SettingsStore;

class SettingsStoreResolverContract implements SettingsStoreResolverContractInterface
{
    public function get(string $id, ?string $scope = null): ?SettingsStore
    {
        return SettingsStore::get($id, $scope);
    }

    public function delete(string $id, ?string $scope = null): int|string
    {
        return SettingsStore::delete($id, $scope);
    }

    /**
     * @throws Exception
     */
    public function set(string $id, float|bool|int|string $data, string $type = 'string', ?string $scope = null): bool
    {
        return SettingsStore::set($id, $data, $type, $scope);
    }

    public function getIdsByScope(string $scope): array
    {
        return SettingsStore::getIdsByScope($scope);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return SettingsStore::locateDaoClass($modelClass);
    }
}
