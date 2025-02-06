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
