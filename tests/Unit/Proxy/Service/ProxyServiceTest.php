<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Service;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use PHPUnit\Framework\MockObject\Exception;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Exceptions\InvalidServiceException;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Service\ProxyService;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUser;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUserCatchStaticCalls;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUserInterface;

class ProxyServiceTest extends Unit
{
    //Object Proxy Tests

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetExistingProxyObjectAndMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::once())->method('createObjectProxy');
        $service = new ProxyService($factory);
        $service->getProxyObject(TestUser::class, 'getObject');

        $this::assertNull($service->getProxyObject(TestUser::class, 'getNull'));
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetExistingProxyObjectAndMagicMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::once())->method('createObjectProxy');
        $service = new ProxyService($factory);
        $service->getProxyObject(TestUserCatchStaticCalls::class, 'getByWhatEver');
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetExistingProxyObjectAndUnknownMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::never())->method('createObjectProxy');
        $service = new ProxyService($factory);
        $this->expectException(InvalidServiceException::class);
        $service->getProxyObject(TestUser::class, 'getObjectTest');
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetUnknownProxyObjectAndUnknownMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::never())->method('createObjectProxy');
        $service = new ProxyService($factory);
        $this->expectException(InvalidServiceException::class);
        $service->getProxyObject('asgdasgdasdg', 'getObjectTest');
    }


    //Decorator Proxy Tests

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetDecoraterExistingObjectAndMethodNoInterface(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::once())->method('createObjectProxy');
        $factory->expects(self::never())->method('createDecoratorProxy');
        $service = new ProxyService($factory);
        $service->getDecoratorProxy(TestUser::class, 'getObject');

        $this::assertNull($service->getDecoratorProxy(TestUser::class, 'getNull'));
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetDecoraterExistingObjectAndMagicMethodNoInterface(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::once())->method('createObjectProxy');
        $factory->expects(self::never())->method('createDecoratorProxy');
        $service = new ProxyService($factory);
        $service->getProxyObject(TestUserCatchStaticCalls::class, 'getByWhatEver');
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetDecoraterExistingObjectAndMethodWithInterface(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::never())->method('createObjectProxy');
        $factory->expects(self::once())->method('createDecoratorProxy');
        $service = new ProxyService($factory);
        $service->getDecoratorProxy(TestUser::class, 'getObject', TestUserInterface::class);

        $this::assertNull($service->getDecoratorProxy(TestUser::class, 'getNull', TestUserInterface::class));
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetDecoraterExistingObjectAndUnknownMethodWithInterface(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::never())->method('createDecoratorProxy');
        $factory->expects(self::never())->method('createObjectProxy');
        $service = new ProxyService($factory);
        $this->expectException(InvalidServiceException::class);
        $service->getDecoratorProxy(TestUser::class, 'getObjectTest', TestUserInterface::class);
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetDecoraterUnknownObjectAndUnknownMethodWithInterface(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::never())->method('createDecoratorProxy');
        $factory->expects(self::never())->method('createObjectProxy');
        $service = new ProxyService($factory);
        $this->expectException(InvalidServiceException::class);
        $service->getDecoratorProxy('asdgasdasgf', 'getObjectTest', TestUserInterface::class);
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetDecoraterExistingObjectAndMagicMethodWithInterface(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::once())->method('createDecoratorProxy');
        $service = new ProxyService($factory);
        $service->getDecoratorProxy(TestUserCatchStaticCalls::class, 'getByWhatEver', TestUserInterface::class);
    }

    //Strict Proxy Tests

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetStrictExistingObjectAndMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::once())->method('createStrictProxy');
        $service = new ProxyService($factory);
        $service->getStrictProxyObject(TestUser::class, 'getObject', TestUserInterface::class);

        $this::assertNull($service->getStrictProxyObject(TestUser::class, 'getNull', TestUserInterface::class));
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetStrictExistingObjectAndMagicMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::once())->method('createStrictProxy');
        $service = new ProxyService($factory);
        $service->getStrictProxyObject(TestUserCatchStaticCalls::class, 'getByWhatEver', TestUserInterface::class);
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetStrictExistingObjectAndUnknownMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::never())->method('createStrictProxy');
        $service = new ProxyService($factory);
        $this->expectException(InvalidServiceException::class);
        $service->getStrictProxyObject(TestUser::class, 'getByWhatEver', TestUserInterface::class);
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('service')]
    public function testGetStrictUnknownObjectAndMethod(): void
    {

        $factory = $this->createMock(RemoteObjectFactoryInterface::class);
        $factory->expects(self::never())->method('createStrictProxy');
        $service = new ProxyService($factory);
        $this->expectException(InvalidServiceException::class);
        $service->getStrictProxyObject('asdasffd', 'getByWhatEver', TestUserInterface::class);
    }

}
