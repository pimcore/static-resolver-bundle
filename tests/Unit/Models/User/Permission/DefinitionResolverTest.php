<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\User\Permission;
use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Permission\DefinitionResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\User\Permission\Definition;

#[Group('contract')]
class DefinitionResolverTest extends ContractAbstractTest
{

    public array $exludeMethodsForReturnTypeCheck = ['create'];

    protected function getClassToTest(): string {
        return Definition::class;
    }

    protected function getContractToTest(): string {
        return DefinitionResolverContract::class;
    }
}