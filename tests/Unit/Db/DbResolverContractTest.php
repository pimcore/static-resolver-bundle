<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Db;


use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Db\DbResolver;

class DbResolverContractTest extends \Codeception\Test\Unit
{
    #[Group('contract')]
    public function testAllMethodsExist()
    {
        $resolver = new DbResolver();

        self::assertTrue(method_exists($resolver, 'getConnection'));
        self::assertTrue(method_exists($resolver, 'reset'));
        self::assertTrue(method_exists($resolver, 'get'));
        self::assertTrue(method_exists($resolver, 'close'));
    }
}
