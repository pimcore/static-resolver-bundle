<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\DataObjectServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Service;

#[Group('contract')]
class DataObjectServiceResolverTest extends ContractAbstractTest
{
    public array $excludedMethods = ['getHelperDefinitions'];

    protected function getClassToTest(): string {
        return Service::class;
    }

    protected function getContractToTest(): string {
        return DataObjectServiceResolverContract::class;
    }
}