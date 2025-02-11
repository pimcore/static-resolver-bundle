<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Db;


use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Db\DbResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Db;

#[Group('contract')]
class DbResolverContractTest extends ContractAbstractTest
{
    protected function getClassToTest(): string
    {
        return Db::class;
    }

    protected function getContractToTest(): string
    {
        return DbResolverContract::class;
    }
}
