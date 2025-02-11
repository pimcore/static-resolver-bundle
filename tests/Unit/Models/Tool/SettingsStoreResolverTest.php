<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Tool;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tool\SettingsStoreResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Tool\SettingsStore;

#[Group('contract')]
class SettingsStoreResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return SettingsStore::class;
    }

    protected function getContractToTest(): string {
        return SettingsStoreResolverContract::class;
    }
}
