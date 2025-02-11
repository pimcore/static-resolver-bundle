<?php
declare(strict_types=1);

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
