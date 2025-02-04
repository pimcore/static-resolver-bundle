<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;


use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Lib\ToolResolver;

class ToolResolverTest extends Unit
{
    #[Group('contract')]
    public function testAllMethodsExist()
    {
        $resolver = new ToolResolver();

        self::assertTrue(method_exists($resolver, 'getValidLanguages'));
        self::assertTrue(method_exists($resolver, 'getSupportedLocales'));
        self::assertTrue(method_exists($resolver, 'getDefaultLanguage'));
        self::assertTrue(method_exists($resolver, 'getMail'));
        self::assertTrue(method_exists($resolver, 'getHostname'));
    }
}
