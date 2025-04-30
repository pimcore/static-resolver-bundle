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

use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;

interface CustomLayoutResolverContractInterface
{
    public function getByNameAndClassId(string $name, string $classId): ?CustomLayout;

    public function create(array $values): CustomLayout;

    public function getById(string $id): ?CustomLayout;

    public function getByName(string $name): ?CustomLayout;

    public function locateDaoClass(string $modelClass): ?string;
}
