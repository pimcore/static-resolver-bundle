<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\User\Role;
use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Role\RoleResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\User\Role;

#[Group('contract')]
class RoleResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getById', 'create', 'getByName'];
    protected function getClassToTest(): string {
        return Role::class;
    }

    protected function getContractToTest(): string {
        return RoleResolverContract::class;
    }
}