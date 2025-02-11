<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User;

use Pimcore\Model\User\UserRole;

interface UserRoleResolverContractInterface
{
    public function getById(int $id): ?UserRole;

    public function create(array $values = []): UserRole;

    public function getByName(string $name): ?UserRole;

    public function locateDaoClass(string $modelClass): ?string;
}
