<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject\ClassificationStore;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassificationStore\GroupConfigResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Classificationstore\GroupConfig;

#[Group('contract')]
class GroupConfigResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return GroupConfig::class;
    }

    protected function getContractToTest(): string {
        return GroupConfigResolverContract::class;
    }
}