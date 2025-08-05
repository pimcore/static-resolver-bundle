<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Document\Hardlink\Wrapper;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\Hardlink\Wrapper\FolderResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Document\Hardlink\Wrapper\Folder;

#[Group('contract')]
class FolderResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getByPath', 'getById', 'create'];

    protected function getClassToTest(): string {
        return Folder::class;
    }

    protected function getContractToTest(): string {
        return FolderResolverContract::class;
    }
}
