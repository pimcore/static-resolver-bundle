<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib\Tools\Authentication;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Lib\Tools\Authentication\AuthenticationResolver;

class AuthenticationResolverTest extends Unit
{
    #[Group('contract')]
    public function testAllMethodsExist()
    {
        $resolver = new AuthenticationResolver();

        self::assertTrue(method_exists($resolver, 'authenticateSession'));
        self::assertTrue(method_exists($resolver, 'generateTokenByUser'));
        self::assertTrue(method_exists($resolver, 'verifyPassword'));
        self::assertTrue(method_exists($resolver, 'generateToken'));
        self::assertTrue(method_exists($resolver, 'getPasswordHash'));
        self::assertTrue(method_exists($resolver, 'isValidUser'));
        self::assertTrue(method_exists($resolver, 'authenticateToken'));
    }
}