<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\User;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Service\ProxyServiceInterface;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUser;
use Pimcore\Bundle\StaticResolverBundle\User\UserResolver;

class UserResolverTest extends Unit
{
    #[Group('user')]
    public function testProxy(): void
    {
        $service = $this->createMock(ProxyServiceInterface::class);
        $service->method('getProxyObject')->willReturnCallback(
            function ($arg1, $arg2, $arg3 = null) {
                if ($arg1 === TestUser::class && $arg2 === 'getObject' && $arg3[0] === 1) {
                    return $this->createMock(TestUser::class);
                }
                return null;
            }
        );

        $user = $service->getProxyObject(TestUser::class, 'getObject', [1]);
        $this->assertInstanceOf(TestUser::class, $user);
        $user = $service->getProxyObject(TestUser::class, 'getObject', [10]);
        $this->assertNull($user);
    }
}
