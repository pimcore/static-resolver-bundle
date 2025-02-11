<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Notification;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Notification\NotificationResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Notification;

#[Group('contract')]
class NotificationResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Notification::class;
    }

    protected function getContractToTest(): string {
        return NotificationResolverContract::class;
    }
}