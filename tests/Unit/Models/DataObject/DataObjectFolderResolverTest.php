<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\DataObjectFolderResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Folder;

#[Group('contract')]
class DataObjectFolderResolverTest extends ContractAbstractTest
{
    public array $excludedMethods = ['__callStatic'];

    public array $exludeMethodsForReturnTypeCheck = ['getById', 'getByPath'];

    protected function getClassToTest(): string {
        return Folder::class;
    }

    protected function getContractToTest(): string {
        return DataObjectFolderResolverContract::class;
    }
}