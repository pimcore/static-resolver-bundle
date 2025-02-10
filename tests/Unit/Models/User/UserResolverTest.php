<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\User;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\UserResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\User;

#[Group('contract')]
class UserResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getById', 'create', 'getByName'];
    protected function getClassToTest(): string {
        return User\UserRole::class;
    }

    protected function getContractToTest(): string {
        return UserResolverContract::class;
    }
}