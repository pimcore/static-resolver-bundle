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
use Pimcore\Model\DataObject\Classificationstore\KeyConfig;

class KeyConfigResolverContract implements KeyConfigResolverContractInterface
{
    public function create(): KeyConfig
    {
        return KeyConfig::create();
    }

    public function getById(int $id, ?bool $force = false): ?KeyConfig
    {
        return KeyConfig::getById($id, $force);
    }

    /**
     * @throws Exception
     */
    public function getByName(string $name, int $storeId = 1, ?bool $force = false): ?KeyConfig
    {
        return KeyConfig::getByName($name, $storeId, $force);
    }
}
