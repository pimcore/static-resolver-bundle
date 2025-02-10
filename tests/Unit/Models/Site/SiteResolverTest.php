<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Site;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Site\SiteResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Site;

#[Group('contract')]
class SiteResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Site::class;
    }

    protected function getContractToTest(): string {
        return SiteResolverContract::class;
    }
}