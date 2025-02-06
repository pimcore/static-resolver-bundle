<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Lib\ConfigResolver;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Config;

#[Group('contract')]
class ConfigResoverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string
    {
        return Config::class;
    }

    protected function getContractToTest(): string
    {
        return ConfigResolver::class;
    }

}