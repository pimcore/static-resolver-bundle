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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassificationStore;

use Exception;
use Pimcore\Model\DataObject\Classificationstore\GroupConfig;

class GroupConfigResolverContract implements GroupConfigResolverContractInterface
{
    public function create(): GroupConfig
    {
        return GroupConfig::create();
    }

    public function getById(int $id, ?bool $force = false): ?GroupConfig
    {
        return GroupConfig::getById($id, $force);
    }

    /**
     * @throws Exception
     */
    public function getByName(string $name, int $storeId = 1, ?bool $force = false): ?GroupConfig
    {
        return GroupConfig::getByName($name, $storeId, $force);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return GroupConfig::locateDaoClass($modelClass);
    }
}
