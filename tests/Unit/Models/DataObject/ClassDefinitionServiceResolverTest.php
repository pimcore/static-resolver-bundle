<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinitionServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\ClassDefinition\Service;

#[Group('contract')]
class ClassDefinitionServiceResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Service::class;
    }

    protected function getContractToTest(): string {
        return ClassDefinitionServiceResolverContract::class;
    }
}