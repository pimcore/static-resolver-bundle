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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Role;

use Pimcore\Model\User\Role;

class RoleResolverContract implements RoleResolverContractInterface
{
    public function create(array $values = []): Role
    {
        return Role::create($values);
    }

    public function getById(int $id): ?Role
    {
        return Role::getById($id);
    }

    public function getByName(string $name): ?Role
    {
        return Role::getByName($name);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Role::locateDaoClass($modelClass);
    }
}
