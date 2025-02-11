<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\User;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\UserRoleResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\User\UserRole;

#[Group('contract')]
class UserRoleResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getById', 'create', 'getByName'];
    protected function getClassToTest(): string {
        return UserRole::class;
    }

    protected function getContractToTest(): string {
        return UserRoleResolverContract::class;
    }
}