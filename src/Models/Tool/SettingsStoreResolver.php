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

use Exception;
use Pimcore\Model\Tool\SettingsStore;

/**
 * @internal
 */
final class SettingsStoreResolver implements SettingsStoreResolverInterface
{

    /**
     * @throws Exception
     */
    public function set(string $id, float|bool|int|string $data, string $type = 'string', ?string $scope = null): bool
    {
        return SettingsStore::set($id, $data, $type, $scope);
    }

    public function delete(string $id, ?string $scope = null): int|string
    {
        return SettingsStore::delete($id, $scope);
    }

    public function get(string $id, ?string $scope = null): ?SettingsStore
    {
       return SettingsStore::get($id, $scope);
    }

    public function getIdsByScope(string $scope): array
    {
        return SettingsStore::getIdsByScope($scope);
    }
}