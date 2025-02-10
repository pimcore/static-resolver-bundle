<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User;

use Pimcore\Model\User;

class UserResolverContract implements UserResolverContractInterface
{

    public function getUserRoleById(int $id): ?User\UserRole
    {
        return User\UserRole::getById($id);
    }

    public function createUserRole(array $values = []): User\UserRole
    {
        return User\UserRole::create($values);
    }

    public function create(array $values = []): User
    {
        return User::create($values);
    }

    public function getById(int $id): ?User
    {
        return User::getById($id);
    }

    public function getByName(string $name): ?User
    {
        return User::getByName($name);
    }

    public function getUserRoleByName(string $name): ?User\UserRole
    {
        return User\UserRole::getByName($name);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return User::locateDaoClass($modelClass);
    }
}
