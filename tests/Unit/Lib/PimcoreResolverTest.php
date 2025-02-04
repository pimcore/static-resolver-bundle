<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;


use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Lib\PimcoreResolver;

class PimcoreResolverTest extends Unit
{
    #[Group('contract')]
    public function testAllMethodsExist()
    {
        $resolver = new PimcoreResolver();

        self::assertTrue(method_exists($resolver, 'inDevMode'));
        self::assertTrue(method_exists($resolver, 'inAdmin'));
        self::assertTrue(method_exists($resolver, 'setAdminMode'));
        self::assertTrue(method_exists($resolver, 'unsetAdminMode'));
        self::assertTrue(method_exists($resolver, 'isInstalled'));
    }
}
