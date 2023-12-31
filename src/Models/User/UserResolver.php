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

namespace Pimcore\Bundle\StaticResolverBundle\Models\User;

use Pimcore\Model\User;

class UserResolver implements UserResolverInterface
{
    public function getById(int $id): ?User
    {
        return User::getById($id);
    }

    public function getByName(string $name): ?User
    {
        return User::getByName($name);
    }

    public function create(array $values = []): User
    {
        return User::create($values);
    }

    public function getUserRoleById(int $id): ?User\UserRole
    {
        return User\UserRole::getById($id);
    }

    public function getUserRoleByName(string $name): ?User\UserRole
    {
        return User\UserRole::getByName($name);
    }

    public function createUserRole(array $values = []): User\UserRole
    {
        return User\UserRole::create($values);
    }
}
