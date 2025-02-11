<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Version;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Version\VersionResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Version;

#[Group('contract')]
class VersionResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Version::class;
    }

    protected function getContractToTest(): string {
        return VersionResolverContract::class;
    }
}