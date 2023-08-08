<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Service;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use PHPUnit\Framework\MockObject\Exception;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference\SmartReferenceFactory;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference\SmartReferenceFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Service\EventProxyService;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Service\InvalidServiceException;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\FinalTestUser;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData\TestUser;
use ProxyManager\Exception\InvalidProxiedClassException;
use ProxyManager\Proxy\AccessInterceptorValueHolderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
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
        $service = new EventProxyService($eventDispatcher, $smartFactory);
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
        $service = new EventProxyService($eventDispatcher, $smartFactory);
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
        $service = new EventProxyService($eventDispatcher, $smartFactory);
        $service->getEventDispatcherProxy((new TestUser()), [], ['getFirstName']);
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
        $service = new EventProxyService($eventDispatcher, $smartFactory);
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
                isInstanceOf(GenericEvent::class),
                $this::callback(
                    static function (GenericEvent $event) {
                        return $event->getSubject() instanceof TestUser;
                    }
                )
            ),
            'pimcore.bundle.staticresolverbundle.tests.unit.proxy.testdata.testuser.getfirstname.post'
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory);
        $proxy = $service->getEventDispatcherProxy((new TestUser()), [], ['getFirstName']);
        $proxy->getFirstName();
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
                isInstanceOf(GenericEvent::class),
                $this::callback(
                    static function (GenericEvent $event) {
                        return $event->getSubject() instanceof TestUser;
                    }
                )
            ),
            'pimcore.bundle.staticresolverbundle.tests.unit.proxy.testdata.testuser.getfirstname.pre'
        );
        $smartFactory = new SmartReferenceFactory();
        $service = new EventProxyService($eventDispatcher, $smartFactory);
        $proxy = $service->getEventDispatcherProxy((new TestUser()),['getFirstName']);
        $proxy->getFirstName();
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
        $service = new EventProxyService($eventDispatcher, $smartFactory);
        $service->getEventDispatcherProxy((new FinalTestUser()),['getFirstName']);
    }
}

