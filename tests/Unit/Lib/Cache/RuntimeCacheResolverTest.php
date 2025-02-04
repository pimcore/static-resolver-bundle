<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib\Cache;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Lib\Cache\RuntimeCacheResolver;

class RuntimeCacheResolverTest extends Unit
{
    #[Group('contract')]
    public function testAllMethodsExistTest()
    {
        $resolver = new RuntimeCacheResolver();

        self::assertTrue(method_exists($resolver, 'load'));
        self::assertTrue(method_exists($resolver, 'save'));
        self::assertTrue(method_exists($resolver, 'isRegistered'));
        self::assertTrue(method_exists($resolver, 'clear'));
    }
}