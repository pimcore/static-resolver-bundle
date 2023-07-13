<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\User;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\User\Interfaces\UserInterface;
use Pimcore\Bundle\StaticResolverBundle\User\UserResolver;

class UserResolverTest extends Unit
{
    #[Group('user')]
    public function testProxy(): void
    {
        //Can mock user resolver and return a user interface instead of a user object.
        $resolver = $this->createMock(UserResolver::class);
        $resolver->method('getById')->willReturnCallback(
            function ($arg) {
                if ($arg === 1) {
                    return $this->createMock(UserInterface::class);
                }
                return null;
            }
        );

        $user = $resolver->getById(1);
        $this->assertInstanceOf(UserInterface::class, $user);
        $user = $resolver->getById(10);
        $this->assertNull($user);
    }
}
