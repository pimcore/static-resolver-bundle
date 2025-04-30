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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Exception;
use Pimcore\Model\DataObject\ClassDefinition;

class ClassDefinitionResolverContract implements ClassDefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getById(string $id, bool $force = false): ?ClassDefinition
    {
        return ClassDefinition::getById($id, $force);
    }

    /**
     * @throws Exception
     */
    public function getByName(string $name): ?ClassDefinition
    {
        return ClassDefinition::getByName($name);
    }

    public function create(array $values = []): ClassDefinition
    {
        return ClassDefinition::create($values);
    }

    public function getByIdIgnoreCase(string $id): ClassDefinition|null
    {
        return ClassDefinition::getByIdIgnoreCase($id);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return ClassDefinition::locateDaoClass($modelClass);
    }
}
