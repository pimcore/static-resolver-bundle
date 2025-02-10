<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib\Cache;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Lib\Cache\RuntimeCacheResolver;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Cache\RuntimeCache;

#[Group('contract')]
class RuntimeCacheResolverTest extends ContractAbstractTest
{

    public array $exludeMethodsForReturnTypeCheck = ['getInstance'];

    protected function getClassToTest(): string
    {
        return RuntimeCache::class;
    }

    protected function getContractToTest(): string
    {
        return RuntimeCacheResolver::class;
    }
}