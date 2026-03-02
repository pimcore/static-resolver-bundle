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

use Pimcore\Model\DataObject\Classificationstore\StoreConfig;

class StoreConfigResolverContract implements StoreConfigResolverContractInterface
{
    public function create(): StoreConfig
    {
        return StoreConfig::create();
    }

    public function getById(int $id): ?StoreConfig
    {
        return StoreConfig::getById($id);
    }

    public function getByName(string $name): ?StoreConfig
    {
        return StoreConfig::getByName($name);
    }
}
