<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;


use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Lib\ToolResolver;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Tool;

#[Group('contract')]
class ToolResolverTest extends  ContractAbstractTest
{
    protected function getClassToTest(): string
    {
        return Tool::class;
    }

    protected function getContractToTest(): string
    {
        return ToolResolver::class;
    }
}
