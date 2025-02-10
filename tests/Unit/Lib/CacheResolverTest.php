<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\CacheResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Cache;

#[Group('contract')]
class CacheResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string
    {
        return Cache::class;
    }

    protected function getContractToTest(): string
    {
        return CacheResolverContract::class;
    }
}