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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User;

use Pimcore\Model\User\UserRole;

class UserRoleResolverContract implements UserRoleResolverContractInterface
{
    public function getById(int $id): ?UserRole
    {
        return UserRole::getById($id);
    }

    public function create(array $values = []): UserRole
    {
        return UserRole::create($values);
    }

    public function getByName(string $name): ?UserRole
    {
        return UserRole::getByName($name);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return UserRole::locateDaoClass($modelClass);
    }
}
