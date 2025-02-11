<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Tag;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tag\TagResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Element\Tag;

#[Group('contract')]
class TagResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Tag::class;
    }

    protected function getContractToTest(): string {
        return TagResolverContract::class;
    }
}