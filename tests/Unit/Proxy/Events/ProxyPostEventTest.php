<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Events;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptorInterface;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\ProxyEventTestClass;

class ProxyPostEventTest extends Unit
{
    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testCreate(): void
    {
        $event = new ProxyPostInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        static::assertInstanceOf(ProxyPostInterceptorInterface::class, $event);
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testBasics(): void
    {
        $event = new ProxyPostInterceptor(
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
        $this->expectException(\InvalidArgumentException::class);
        static::assertEquals(1, $event->getMethodArgument('fuu'));
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testGetSubjectClass(): void
    {
        $event = new ProxyPostInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        static::assertEquals(ProxyEventTestClass::class, $event->getSubjectClass());
    }
}

