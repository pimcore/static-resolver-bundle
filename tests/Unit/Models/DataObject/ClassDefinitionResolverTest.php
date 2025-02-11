<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinitionResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\ClassDefinition;

#[Group('contract')]
class ClassDefinitionResolverTest extends ContractAbstractTest
{
    public array $excludedMethods = ['__set_state'];

    protected function getClassToTest(): string {
        return ClassDefinition::class;
    }

    protected function getContractToTest(): string {
        return ClassDefinitionResolverContract::class;
    }
}