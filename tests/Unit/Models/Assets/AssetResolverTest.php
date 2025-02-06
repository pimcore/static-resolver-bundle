<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Assets;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\AssetResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Asset;

#[Group('contract')]
class AssetResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Asset::class;
    }

    protected function getContractToTest(): string {
        return AssetResolverContract::class;
    }
}