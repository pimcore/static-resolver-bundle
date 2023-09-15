<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Events;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEvent;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\FinalTestUser;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\ProxyEventTestClass;

class ProxyEventTest extends Unit
{

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testBasics(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        $this->assertInstanceOf(ProxyEvent::class, $event);
        $this->assertFalse($event->hasResponse());
        $event->setResponse('test');
        $this->assertTrue($event->hasResponse());
        $this->assertEquals('test', $event->getResponse());
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testStringReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        $event->setResponse('test');
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse(1);
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testIntReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'intReturnType']);
        $event->setResponse(1);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testBoolReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'boolReturnType']);
        $event->setResponse(true);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testFloatReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'floatReturnType']);
        $event->setResponse(1.1);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testArrayReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'arrayReturnType']);
        $event->setResponse(['test']);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testCallableReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'callableReturnType']);
        $event->setResponse(function () {
            return 'test';
        });
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testIterableReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'iterableReturnType']);
        $event->setResponse(['test']);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testObjectReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'objectReturnType']);
        $event->setResponse(new FinalTestUser());
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testVoidReturnTypewithNull(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'voidReturnType']);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse(null);
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testVoidReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'voidReturnType']);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse('test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testMixedReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'mixedReturnType']);
        $event->setResponse('test');
        $event->setResponse(1);
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testUnionReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'unionReturnType']);
        $event->setResponse('test');
        $event->setResponse(1);
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse(true);
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testUnknownReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'unknownReturnType']);
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

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testNullableReturnType(): void
    {
        $event = new ProxyEvent(new ProxyEventTestClass(), ['method' => 'nullableReturnType']);
        $event->setResponse(null);
        $event->setResponse('test');
        $this->expectException(\InvalidArgumentException::class);
        $event->setResponse(1);
    }
}