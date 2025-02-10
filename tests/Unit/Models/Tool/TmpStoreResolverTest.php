<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Tool;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tool\TmpStoreResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Tool\TmpStore;

#[Group('contract')]
class TmpStoreResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return TmpStore::class;
    }

    protected function getContractToTest(): string {
        return TmpStoreResolverContract::class;
    }
}
