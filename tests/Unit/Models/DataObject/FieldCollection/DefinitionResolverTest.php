<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject\FieldCollection;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\FieldCollection\DefinitionResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Fieldcollection\Definition;

#[Group('contract')]
class DefinitionResolverTest extends ContractAbstractTest
{
    public array $excludedMethods = ['__set_state'];

    protected function getClassToTest(): string {
        return Definition::class;
    }

    protected function getContractToTest(): string {
        return DefinitionResolverContract::class;
    }
}