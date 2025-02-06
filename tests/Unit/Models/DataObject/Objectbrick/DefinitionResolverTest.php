<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject\Objectbrick;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\Objectbrick\DefinitionResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Objectbrick\Definition;

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