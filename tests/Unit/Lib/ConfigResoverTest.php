<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Lib\ConfigResolver;

class ConfigResoverTest extends Unit
{
    #[Group('contract')]
    public function testAllMethodsExist()
    {
        $resolver = new ConfigResolver();

        static::assertTrue(method_exists($resolver, 'locateConfigFile'));
        static::assertTrue(method_exists($resolver, 'getSystemConfiguration'));
        static::assertTrue(method_exists($resolver, 'getWebsiteConfigRuntimeCacheKey'));
        static::assertTrue(method_exists($resolver, 'getWebsiteConfig'));
        static::assertTrue(method_exists($resolver, 'getWebsiteConfigValue'));
        static::assertTrue(method_exists($resolver, 'getReportConfig'));
        static::assertTrue(method_exists($resolver, 'inPerspective'));
        static::assertTrue(method_exists($resolver, 'getEnvironment'));
        static::assertTrue(method_exists($resolver, 'getConfigInstance'));
    }

}