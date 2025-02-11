<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\LocalizedFieldResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Localizedfield;

#[Group('contract')]
class LocalizedFieldResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Localizedfield::class;
    }

    protected function getContractToTest(): string {
        return LocalizedFieldResolverContract::class;
    }
}