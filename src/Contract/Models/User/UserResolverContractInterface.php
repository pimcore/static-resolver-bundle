<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User;

use Pimcore\Model\User;

interface UserResolverContractInterface
{
    public function getUserRoleById(int $id): ?User\UserRole;

    public function createUserRole(array $values = []): User\UserRole;

    public function create(array $values = []): User;

    public function getById(int $id): ?User;

    public function getByName(string $name): ?User;

    public function getUserRoleByName(string $name): ?User\UserRole;

    public function locateDaoClass(string $modelClass): ?string;
}
