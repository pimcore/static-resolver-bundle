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
use Pimcore\Model\DataObject\Classificationstore\GroupConfig;

interface GroupConfigResolverContractInterface
{
    public function create(): GroupConfig;

    public function getById(int $id, ?bool $force = false): ?GroupConfig;

    /**
     * @throws Exception
     */
    public function getByName(string $name, int $storeId = 1, ?bool $force = false): ?GroupConfig;

    public function locateDaoClass(string $modelClass): ?string;
}
