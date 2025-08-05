<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\WebsiteSetting;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\WebsiteSetting\WebsiteSettingResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\WebsiteSetting;

#[Group('contract')]
class WebsiteSettingsResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return WebsiteSetting::class;
    }

    protected function getContractToTest(): string {
        return WebsiteSettingResolverContract::class;
    }
}
