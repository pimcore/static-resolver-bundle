<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Element;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Element\ServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Element\Service;

#[Group('contract')]
class ServiceResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Service::class;
    }

    protected function getContractToTest(): string {
        return ServiceResolverContract::class;
    }
}