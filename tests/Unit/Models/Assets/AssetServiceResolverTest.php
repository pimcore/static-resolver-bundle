<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Assets;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\AssetServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Asset\Service;

#[Group('contract')]
class AssetServiceResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Service::class;
    }

    protected function getContractToTest(): string {
        return AssetServiceResolverContract::class;
    }
}