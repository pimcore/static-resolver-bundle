<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Assets\Image\Thumbnail;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Image\Thumbnail\ConfigResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Asset\Image\Thumbnail\Config;

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