<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\DataObject\ClassificationStore;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\Classificationstore\KeyGroupRelationResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\DataObject\Classificationstore\KeyGroupRelation;

#[Group('contract')]
class KeyGroupRelationResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['create', 'getByGroupAndKeyId'];
    
    public array $excludedMethods = ['getById'];

    protected function getClassToTest(): string {
        return KeyGroupRelation::class;
    }

    protected function getContractToTest(): string {
        return KeyGroupRelationResolverContract::class;
    }
}