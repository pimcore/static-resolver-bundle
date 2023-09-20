<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Adapter;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use InvalidArgumentException;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\ObjectAdapterInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\StrictObjectAdapter;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUser;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUserBInterface;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUserCompatibleInterface;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUserInterface;

class StrictObjectAdapterTest extends Unit
{
    #[Group('adapter')]
    #[Group('proxy')]
    public function testObjectImplementsInterface(): void
    {
        $object = new TestUser();
        //Class TestUser does implement TestUserInterface
        $adapter = new StrictObjectAdapter($object, TestUserInterface::class);
        static::assertInstanceOf(ObjectAdapterInterface::class, $adapter);
        static::assertEquals('John', $adapter->call('TestUser', 'getFirstName'));
    }

    #[Group('adapter')]
    #[Group('proxy')]
    public function testObjectIncompatibleInterface(): void
    {
        $object = new TestUser();
        //Class TestUser does not implement TestUserBInterface and not all methods are implemented.
        //No magic calls are possible.
        $this->expectException(InvalidArgumentException::class);
        new StrictObjectAdapter($object, TestUserBInterface::class);
    }



    #[Group('adapter')]
    #[Group('proxy')]
    public function testObjectUnknownInterface(): void
    {
        $object = new TestUser();
        //Class TestUser does not implement TestUserBInterface and not all methods are implemented.
        //No magic calls are possible.
        $this->expectException(InvalidArgumentException::class);
        new StrictObjectAdapter($object, 'asdasdfasdf');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    public function testObjectWithCompatibleInterface(): void
    {
        $object = new TestUser();
        //Class TestUser does not implement TestUserCompatibleInterface but all methods are implemented.
        $adapter = new StrictObjectAdapter($object, TestUserCompatibleInterface::class);
        static::assertInstanceOf(ObjectAdapterInterface::class, $adapter);
        static::assertEquals('John', $adapter->call('TestUser', 'getFirstName'));
    }
}
