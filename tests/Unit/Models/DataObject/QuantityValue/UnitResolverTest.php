<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject\QuantityValue;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\QuantityValue\UnitResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\QuantityValue\Unit;

#[Group('contract')]
class UnitResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Unit::class;
    }

    protected function getContractToTest(): string {
        return UnitResolverContract::class;
    }
}