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
