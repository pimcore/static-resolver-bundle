<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Service;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use PHPUnit\Framework\MockObject\Exception;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEvent;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEventInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events\ProxyEventFactory;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\Events\ProxyEventFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference\SmartReferenceFactory;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference\SmartReferenceFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Service\EventProxyService;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Service\InvalidServiceException;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\FinalTestUser;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUser;
use ProxyManager\Exception\InvalidProxiedClassException;
use ProxyManager\Proxy\AccessInterceptorValueHolderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use function PHPUnit\Framework\isInstanceOf;

class EventProxyServiceTest extends Unit
{
    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithPreAndPostInterceptors(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::never())->method('dispatch');
        $smartFactory = $this->createMock(SmartReferenceFactoryInterface::class);

        $smartProxy = $this->createMock(AccessInterceptorValueHolderInterface::class);
        $smartProxy->expects(self::once())->method('setMethodPrefixInterceptor');
        $smartProxy->expects(self::once())->method('setMethodSuffixInterceptor');
        $smartFactory->method('createProxy')->willReturnCallback(
                function () use ($smartProxy) {
                    return $smartProxy;
                }
            );
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $service->getEventDispatcherProxy((new TestUser()), ['getFirstName'], ['getFirstName']);
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithPreInterceptors(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::never())->method('dispatch');
        $smartFactory = $this->createMock(SmartReferenceFactoryInterface::class);

        $smartProxy = $this->createMock(AccessInterceptorValueHolderInterface::class);
        $smartProxy->expects(self::once())->method('setMethodPrefixInterceptor');
        $smartProxy->expects(self::never())->method('setMethodSuffixInterceptor');
        $smartFactory->method('createProxy')->willReturnCallback(
            function () use ($smartProxy) {
                return $smartProxy;
            }
        );
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $service->getEventDispatcherProxy((new TestUser()), ['getFirstName']);
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithPostInterceptors(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::never())->method('dispatch');
        $smartFactory = $this->createMock(SmartReferenceFactoryInterface::class);

        $smartProxy = $this->createMock(AccessInterceptorValueHolderInterface::class);
        $smartProxy->expects(self::once())->method('setMethodSuffixInterceptor');
        $smartProxy->expects(self::never())->method('setMethodPrefixInterceptor');
        $smartFactory->method('createProxy')->willReturnCallback(
            function () use ($smartProxy) {
                return $smartProxy;
            }
        );
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $service->getEventDispatcherProxy((new TestUser()), [], ['getFirstName']);
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithPostInterceptorsAndCustomResult(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::once())->method('dispatch');

        $proxyEventFactoryMock = $this->createMock(ProxyEventFactoryInterface::class);
        $proxyEventFactoryMock->expects(self::once())->method('createProxyEvent')->willReturnCallback(
            function () {
                $eventMock = $this->createMock(ProxyEventInterface::class);
                $eventMock->expects(self::once())->method('hasResponse')->willReturn(true);
                $eventMock->expects(self::once())->method('getResponse')->willReturn('Foo');
                return $eventMock;
            }
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $proxyEventFactoryMock);
        $proxy = $service->getEventDispatcherProxy((new TestUser()), [], ['getFirstName']);
        $proxy->getFirstName();
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithPostInterceptorsAndNoCustomResult(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::once())->method('dispatch');

        $proxyEventFactoryMock = $this->createMock(ProxyEventFactoryInterface::class);
        $proxyEventFactoryMock->expects(self::once())->method('createProxyEvent')->willReturnCallback(
            function () {
                $eventMock = $this->createMock(ProxyEventInterface::class);
                $eventMock->expects(self::once())->method('hasResponse')->willReturn(false);
                $eventMock->expects(self::never())->method('getResponse');
                return $eventMock;
            }
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $proxyEventFactoryMock);
        $proxy = $service->getEventDispatcherProxy((new TestUser()), [], ['getFirstName']);
        $proxy->getFirstName();
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithPreInterceptorsAndNoCustomResult(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::once())->method('dispatch');

        $proxyEventFactoryMock = $this->createMock(ProxyEventFactoryInterface::class);
        $proxyEventFactoryMock->expects(self::once())->method('createProxyEvent')->willReturnCallback(
            function () {
                $eventMock = $this->createMock(ProxyEventInterface::class);
                $eventMock->expects(self::once())->method('hasResponse')->willReturn(false);
                $eventMock->expects(self::never())->method('getResponse');
                return $eventMock;
            }
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $proxyEventFactoryMock);
        $proxy = $service->getEventDispatcherProxy((new TestUser()), ['getFirstName']);
        $proxy->getFirstName();
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithPreInterceptorsAndCustomResult(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::once())->method('dispatch');

        $proxyEventFactoryMock = $this->createMock(ProxyEventFactoryInterface::class);
        $proxyEventFactoryMock->expects(self::once())->method('createProxyEvent')->willReturnCallback(
            function () {
                $eventMock = $this->createMock(ProxyEventInterface::class);
                $eventMock->expects(self::once())->method('hasResponse')->willReturn(true);
                $eventMock->expects(self::once())->method('getResponse')->willReturn('Foo');
                return $eventMock;
            }
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $proxyEventFactoryMock);
        $proxy = $service->getEventDispatcherProxy((new TestUser()), ['getFirstName']);
        $proxy->getFirstName();
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCreateEventProxyWithOutInterceptors(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::never())->method('dispatch');
        $smartFactory = $this->createMock(SmartReferenceFactoryInterface::class);

        $smartProxy = $this->createMock(AccessInterceptorValueHolderInterface::class);
        $smartProxy->expects(self::never())->method('setMethodSuffixInterceptor');
        $smartProxy->expects(self::never())->method('setMethodPrefixInterceptor');
        $smartFactory->method('createProxy')->willReturnCallback(
            function () use ($smartProxy) {
                return $smartProxy;
            }
        );
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $service->getEventDispatcherProxy((new TestUser()));
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testTriggerEventByProxyWithPostInterceptors(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::once())->method('dispatch')->with(
            $this::logicalAnd(
                isInstanceOf(ProxyEvent::class),
                $this::callback(
                    static function (ProxyEvent $event) {
                        return $event->getSubject() instanceof TestUser &&
                            $event->getArgument('params')['name'] === 'test' &&
                            $event->getArgument('method') === 'setLastName' &&
                        $event->getArgument('returnValue') === 'test_returnValue';
                    }
                )
            ),
            'pimcore.bundle.staticresolverbundle.tests.unit.proxy.testdata.testuser.setlastname.post'
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $proxy = $service->getEventDispatcherProxy((new TestUser()), [], ['setLastName']);
        $proxy->setLastName('test');
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testTriggerEventByProxyWithPreInterceptors(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::once())->method('dispatch')->with(
            $this::logicalAnd(
                isInstanceOf(ProxyEvent::class),
                $this::callback(
                    static function (ProxyEvent $event) {
                        return $event->getSubject() instanceof TestUser &&
                            $event->getArgument('method') === 'setLastName' &&
                            $event->getArgument('params')['name'] === 'test';
                    }
                )
            ),
            'pimcore.bundle.staticresolverbundle.tests.unit.proxy.testdata.testuser.setlastname.pre'
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $proxy = $service->getEventDispatcherProxy((new TestUser()),['setLastName']);
        $proxy->setLastName('test');
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCustomEventPreInterceptor(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::exactly(2))->method('dispatch')->with(
            $this::logicalOr(
                $this::logicalAnd(
                    isInstanceOf(ProxyEvent::class),
                    $this::callback(
                        static function (ProxyEvent $event) {
                            return $event->getSubject() instanceof TestUser &&
                                $event->getArgument('method') === 'setLastName' &&
                                $event->getArgument('params')['name'] === 'test';
                        }
                    ),
                    'pimcore.bundle.staticresolverbundle.tests.unit.proxy.testdata.testuser.setlastname.pre'
                ),
                $this::logicalAnd(
                    isInstanceOf(ProxyEvent::class),
                    $this::callback(
                        static function (ProxyEvent $event) {
                            return $event->getSubject() instanceof TestUser &&
                                $event->getArgument('method') === 'setLastName' &&
                                $event->getArgument('params')['name'] === 'test';
                        }
                    )
                ),
                'customEvent.pre'
            )
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $proxy = $service->getEventDispatcherProxy((new TestUser()),['setLastName'],[],'CustomEvent');
        $proxy->setLastName('test');
    }

    /**
     * @throws InvalidServiceException
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testCustomEventPostInterceptor(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects(self::exactly(2))->method('dispatch')->with(
            $this::logicalOr(
                $this::logicalAnd(
                    isInstanceOf(ProxyEvent::class),
                    $this::callback(
                        static function (ProxyEvent $event) {
                            return $event->getSubject() instanceof TestUser &&
                                $event->getArgument('method') === 'setLastName' &&
                                $event->getArgument('params')['name'] === 'test';
                        }
                    ),
                    'pimcore.bundle.staticresolverbundle.tests.unit.proxy.testdata.testuser.setlastname.post'
                ),
                $this::logicalAnd(
                    isInstanceOf(ProxyEvent::class),
                    $this::callback(
                        static function (ProxyEvent $event) {
                            return $event->getSubject() instanceof TestUser &&
                                $event->getArgument('method') === 'setLastName' &&
                                $event->getArgument('params')['name'] === 'test';
                        }
                    )
                ),
                'customEvent.post'
            )
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $proxy = $service->getEventDispatcherProxy((new TestUser()),[],['setLastName'],'CustomEvent');
        $proxy->setLastName('test');
    }

    /**
     * @throws Exception
     */
    #[Group('proxy')]
    #[Group('eventproxy')]
    #[Group('service')]
    public function testFailCreateProxyForFinalClass(): void
    {
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $this->expectException(InvalidProxiedClassException::class);
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory, $this->getProxyEventFactory());
        $service->getEventDispatcherProxy((new FinalTestUser()),['getFirstName']);
    }

    private function getProxyEventFactory(): ProxyEventFactoryInterface
    {
        return new ProxyEventFactory();
    }
}

