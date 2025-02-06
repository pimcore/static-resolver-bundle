<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject\ClassDefinition\CustomLayout;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinition\CustomLayout\CustomLayoutResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;

#[Group('contract')]
class CustomLayoutResolverTest extends ContractAbstractTest
{
    public array $excludedMethods = ['__set_state'];

    protected function getClassToTest(): string {
        return CustomLayout::class;
    }

    protected function getContractToTest(): string {
        return CustomLayoutResolverContract::class;
    }
}