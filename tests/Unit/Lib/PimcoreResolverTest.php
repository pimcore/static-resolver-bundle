<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;


use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Lib\PimcoreResolver;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;

#[Group('contract')]
class PimcoreResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string
    {
        return \Pimcore::class;
    }

    protected function getContractToTest(): string
    {
        return PimcoreResolver::class;
    }
}
