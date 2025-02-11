<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\User\Role;
use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Role\FolderResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\User\Role\Folder;

#[Group('contract')]
class FolderResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getById', 'create', 'getByName'];
    protected function getClassToTest(): string {
        return Folder::class;
    }

    protected function getContractToTest(): string {
        return FolderResolverContract::class;
    }
}