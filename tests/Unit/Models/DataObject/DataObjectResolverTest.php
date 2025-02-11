<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\DataObjectResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject;

#[Group('contract')]
class DataObjectResolverTest extends ContractAbstractTest
{
    public array $excludedMethods = ['__callStatic'];

    public array $exludeMethodsForReturnTypeCheck = ['getById', 'getByPath'];

    protected function getClassToTest(): string {
        return DataObject::class;
    }

    protected function getContractToTest(): string {
        return DataObjectResolverContract::class;
    }
}