<?php
declare(strict_types=1);

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
