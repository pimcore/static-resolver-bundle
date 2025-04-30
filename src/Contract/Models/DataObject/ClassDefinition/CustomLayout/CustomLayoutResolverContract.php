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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinition\CustomLayout;

use Exception;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;

class CustomLayoutResolverContract implements CustomLayoutResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByNameAndClassId(string $name, string $classId): ?CustomLayout
    {
        return CustomLayout::getByNameAndClassId($name, $classId);
    }

    public function create(array $values): CustomLayout
    {
        return CustomLayout::create($values);
    }

    public function getById(string $id): ?CustomLayout
    {
        return CustomLayout::getById($id);
    }

    /**
     * @throws Exception
     */
    public function getByName(string $name): ?CustomLayout
    {
        return CustomLayout::getByName($name);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return CustomLayout::locateDaoClass($modelClass);
    }
}
