<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Events;

use ArrayIterator;
use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use InvalidArgumentException;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\FinalTestUser;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\FinalTestUserWithChildInterface;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\ProxyEventTestClass;
use ReflectionException;

class ProxyPreEventTest extends Unit
{

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testCreate(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        static::assertInstanceOf(ProxyPreInterceptor::class, $event);
    }
    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testBasics(): void
    {
        $event = new ProxyPreInterceptor(
            new ProxyEventTestClass(),
            [
                'method' => 'testBasics',
                'params' => ['name' => 'test', 'id' => 1],
                'returnValue' => 'test1'
            ]
        );
        static::assertEquals('test1', $event->getReturnValue());
        static::assertEquals('testBasics', $event->getMethodName());
        static::assertEquals(['name' => 'test', 'id' => 1], $event->getMethodArguments());
        static::assertEquals('test', $event->getMethodArgument('name'));
        static::assertEquals(1, $event->getMethodArgument('id'));
        static::assertTrue($event->agrumentExists('name'));
        static::assertFalse($event->agrumentExists('fuu'));

        static::assertFalse($event->hasResponse());
        $event->setResponse('test');
        static::assertTrue($event->hasResponse());
        static::assertEquals('test', $event->getResponse());

        $this->expectException(InvalidArgumentException::class);
        static::assertEquals(1, $event->getMethodArgument('fuu'));
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testLockResponse(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        static::assertFalse($event->isResponseLocked());
        static::assertTrue($event->setResponse('test'));
        $event->lockResponse();
        static::assertTrue($event->isResponseLocked());
        static::assertFalse($event->setResponse('test'));
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testStringReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        $event->setResponse('test');
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse(1);
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testIntReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'intReturnType']);
        $event->setResponse(1);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testBoolReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'boolReturnType']);
        $event->setResponse(true);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testFloatReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'floatReturnType']);
        $event->setResponse(1.1);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testArrayReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'arrayReturnType']);
        $event->setResponse(['test']);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testCallableReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'callableReturnType']);
        $event->setResponse(function () {
            return 'test';
        });
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testIterableReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'iterableReturnType']);
        $event->setResponse(['test']);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testObjectReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'objectReturnType']);
        $event->setResponse(new FinalTestUser());
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testVoidReturnTypewithNull(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'voidReturnType']);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse(null);
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testVoidReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'voidReturnType']);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse('test');
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testMixedReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'mixedReturnType']);
        $event->setResponse('test');
        $event->setResponse(1);
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testUnionReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'unionReturnType']);
        $event->setResponse('test');
        $event->setResponse(1);
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse(true);
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testUnknownReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'unknownReturnType']);
        $event->setResponse('test');
        $event->setResponse(1);
        $event->setResponse(true);
        $event->setResponse(null);
        $event->setResponse(['test']);
        $event->setResponse(function () {
            return 'test';
        });
        $event->setResponse(new FinalTestUser());
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testNullableReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'nullableReturnType']);
        $event->setResponse(null);
        $event->setResponse('test');
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse(1);
    }

    /**
     * @throws ReflectionException
     */
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testInterfaceReturnType(): void
    {
        $event = new ProxyPreInterceptor(new ProxyEventTestClass(), ['method' => 'interfaceReturnType']);
        $event->setResponse(new FinalTestUser());
        $event->setResponse(new FinalTestUserWithChildInterface());
        $this->expectException(InvalidArgumentException::class);
        $event->setResponse(new ArrayIterator());
    }
}
