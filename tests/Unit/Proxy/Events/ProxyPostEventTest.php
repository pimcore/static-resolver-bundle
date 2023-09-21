<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Events;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptorInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Exceptions\ReadOnlyException;
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
    public function testForbidenSetArgument(): void
    {
        $event = new ProxyPostInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        $this->expectException(ReadOnlyException::class);
        $event->setArgument('test', 'test');
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testForbidenSetArguments(): void
    {
        $event = new ProxyPostInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        $this->expectException(ReadOnlyException::class);
        $event->setArguments(['test' => 'test']);
    }

    #[Group('adapter')]
    #[Group('proxy')]
    #[Group('event')]
    public function testForbidenGetSubject(): void
    {
        $event = new ProxyPostInterceptor(new ProxyEventTestClass(), ['method' => 'stringReturnType']);
        $this->expectException(ReadOnlyException::class);
        $event->getSubject();
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

