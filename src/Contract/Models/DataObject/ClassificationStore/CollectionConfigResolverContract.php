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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassificationStore;

use Exception;
use Pimcore\Model\DataObject\Classificationstore\CollectionConfig;

class CollectionConfigResolverContract implements CollectionConfigResolverContractInterface
{
    public function create(): CollectionConfig
    {
        return CollectionConfig::create();
    }

    public function getById(int $id, ?bool $force = false): ?CollectionConfig
    {
        return CollectionConfig::getById($id, $force);
    }

    /**
     * @throws Exception
     */
    public function getByName(string $name, int $storeId = 1, ?bool $force = false): ?CollectionConfig
    {
        return CollectionConfig::getByName($name, $storeId, $force);
    }
}
