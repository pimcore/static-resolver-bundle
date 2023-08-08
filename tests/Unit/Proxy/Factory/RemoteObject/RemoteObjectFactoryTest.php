<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Factory\RemoteObject;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use InvalidArgumentException;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactory;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUser;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUserBInterface;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUserInterface;

class RemoteObjectFactoryTest extends Unit
{
    #[Group('proxy')]
    #[Group('factory')]
    public function testRemoteObjectFactory(): void
    {
        $factory = new RemoteObjectFactory();
        $this->assertInstanceOf(RemoteObjectFactoryInterface::class, $factory);
        $factory = new RemoteObjectFactory();
        $this->assertInstanceOf(RemoteObjectFactoryInterface::class, $factory);
    }

    #[Group('proxy')]
    #[Group('factory')]
    public function testCreateObjectProxy(): void
    {
        $factory = new RemoteObjectFactory();
        //Proxy is created for a class. Must implement from class interface.
        $proxy = $factory->createObjectProxy(new TestUser());
        $this->assertInstanceOf(TestUserInterface::class, $proxy);
        //Proxy must call the method of the class.
        $this->assertEquals('John', $proxy->getFirstName());
    }

    #[Group('proxy')]
    #[Group('factory')]
    public function testCreateStrictProxy(): void
    {
        $factory = new RemoteObjectFactory();
        //Strict proxy must not throw an exception if the interface is implemented.
        $proxy = $factory->createStrictProxy(TestUserInterface::class, new TestUser());
        $this->assertInstanceOf(TestUserInterface::class, $proxy);
        //Proxy must call the method of the class.
        $this->assertEquals('John', $proxy->getFirstName());

        $factory = new RemoteObjectFactory();
        $this->expectException(InvalidArgumentException::class);
        //Strict proxy must throw an exception if the interface is not implemented.
        $factory->createStrictProxy(TestUserBInterface::class, new TestUser());
    }

    #[Group('proxy')]
    #[Group('factory')]
    public function testCreateDecoratorProxy(): void
    {
        $factory = new RemoteObjectFactory();
        //Decorator proxy must not throw an exception if the interface is implemented.
        $proxy = $factory->createDecoratorProxy(TestUserInterface::class, new TestUser());
        $this->assertInstanceOf(TestUserInterface::class, $proxy);

        $factory = new RemoteObjectFactory();
        $proxy = $factory->createDecoratorProxy(TestUserBInterface::class, new TestUser());
        //Decorator proxy is not strict,
        //So it must be possible to create a proxy for an interface that is not implemented.
        $this->assertInstanceOf(TestUserBInterface::class, $proxy);
        //Proxy must call the method of the class.
        $this->assertEquals('John', $proxy->getFirstName());
        //Can use the interface to call magic methods
        $this->assertEquals('getId', $proxy->getId());
    }

    #[Group('proxy')]
    #[Group('factory')]
    public function testCreateProxyNOOutputCache(): void
    {
        $factory = new RemoteObjectFactory();
        $proxy = $factory->createObjectProxy(new TestUser());
        $this->assertInstanceOf(TestUserInterface::class, $proxy);

        $proxy = $factory->createStrictProxy(TestUserInterface::class, new TestUser());
        $this->assertInstanceOf(TestUserInterface::class, $proxy);

        $proxy = $factory->createDecoratorProxy(TestUserInterface::class, new TestUser());
        $this->assertInstanceOf(TestUserInterface::class, $proxy);

    }

    #[Group('proxy')]
    #[Group('factory')]
    public function testMethodsAvailable(): void
    {
        $factory = new RemoteObjectFactory();
        //Proxy contains all public methods of the object. Independent of the interface.
        $proxy = $factory->createObjectProxy(new TestUser());
        //All methods of the object must be available.
        $this->assertTrue(method_exists($proxy, 'getFirstName'));
        $this->assertTrue(method_exists($proxy, 'getLastName'));
    }

    #[Group('proxy')]
    #[Group('factory')]
    public function testMethodsAvailableStrictProxy(): void
    {
        $factory = new RemoteObjectFactory();
        $proxy = $factory->createStrictProxy(TestUserInterface::class, new TestUser());
        //Method in Interface, must be available.
        $this->assertTrue(method_exists($proxy, 'getFirstName'));
        //Method not in Interface, must not be available. No matter if it is in the class.
        $this->assertFalse(method_exists($proxy, 'getLastName'));
    }

    #[Group('proxy')]
    #[Group('factory')]
    public function testMethodsAvailableDecoratorProxy(): void
    {
        $factory = new RemoteObjectFactory();
        $proxy = $factory->createDecoratorProxy(TestUserBInterface::class, new TestUser());
        //Method in Interface, must be available.
        $this->assertTrue(method_exists($proxy, 'getFirstName'));
        //Method in Interface, must be available. No matter if it is in the class or not.
        $this->assertTrue(method_exists($proxy, 'getId'));
        //Method not in Interface, must not be available.
        $this->assertFalse(method_exists($proxy, 'getLastName'));
    }
}
