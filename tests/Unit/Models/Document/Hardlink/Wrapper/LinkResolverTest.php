<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Document\Hardlink\Wrapper;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\Hardlink\Wrapper\LinkResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Document\Hardlink\Wrapper\Link;

#[Group('contract')]
class LinkResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getByPath', 'getById', 'create'];

    protected function getClassToTest(): string {
        return Link::class;
    }

    protected function getContractToTest(): string {
        return LinkResolverContract::class;
    }
}
