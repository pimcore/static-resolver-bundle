<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Document\Hardlink\Wrapper;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\Hardlink\Wrapper\HardlinkResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Document\Hardlink\Wrapper\Hardlink;

#[Group('contract')]
class HardlinkResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getByPath', 'getById', 'create'];

    protected function getClassToTest(): string {
        return Hardlink::class;
    }

    protected function getContractToTest(): string {
        return HardlinkResolverContract::class;
    }
}
