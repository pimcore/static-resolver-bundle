<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ConcreteObjectResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Concrete;

#[Group('contract')]
class ConcreteObjectResolverTest extends ContractAbstractTest
{
    public array $excludedMethods = ['__callStatic'];

    public array $exludeMethodsForReturnTypeCheck = ['getById', 'getByPath'];

    protected function getClassToTest(): string {
        return Concrete::class;
    }

    protected function getContractToTest(): string {
        return ConcreteObjectResolverContract::class;
    }
}