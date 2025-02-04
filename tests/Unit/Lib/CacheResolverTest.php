<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Lib\CacheResolver;

class CacheResolverTest extends Unit
{
    #[Group('contract')]
    public function testAllMethodsExist()
    {
        $resolver = new CacheResolver();

        self::assertTrue(method_exists($resolver, 'save'));
        self::assertTrue(method_exists($resolver, 'load'));
        self::assertTrue(method_exists($resolver, 'remove'));
        self::assertTrue(method_exists($resolver, 'clearAll'));
        self::assertTrue(method_exists($resolver, 'clearTag'));
        self::assertTrue(method_exists($resolver, 'clearTags'));
        self::assertTrue(method_exists($resolver, 'enable'));
        self::assertTrue(method_exists($resolver, 'isEnabled'));
        self::assertTrue(method_exists($resolver, 'disable'));
    }
}