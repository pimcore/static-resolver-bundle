<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Role;

use Pimcore\Model\User\Role;

interface RoleResolverContractInterface
{
    public function create(array $values = []): Role;

    public function getById(int $id): ?Role;

    public function getByName(string $name): ?Role;

    public function locateDaoClass(string $modelClass): ?string;
}
