<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Assets\Video\Thumbnail;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Video\Thumbnail\ConfigResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Asset\Video\Thumbnail\Config;

#[Group('contract')]
class ConfigResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string
    {
        return Config::class;
    }

    protected function getContractToTest(): string
    {
        return ConfigResolverContract::class;
    }
}