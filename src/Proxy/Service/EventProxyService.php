<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference\SmartReferenceFactoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class EventProxyService implements EventProxyServiceInterface
{

    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly SmartReferenceFactoryInterface $smartReferenceFactory
    )
    {
    }

    public function getEventDispatcherProxy(
        object $instance,
        array $preInterceptors = [],
        array $postInterceptors = []
    ): object
    {
        $proxy = $this->smartReferenceFactory->createProxy($instance);
        foreach ($preInterceptors as $method) {
            $proxy->setMethodPrefixInterceptor(
                $method,
                function () use ($method, $instance) {
                    $this->eventDispatcher->dispatch(
                        (new GenericEvent($instance, ['method' => $method])),
                        strtolower(
                            str_replace('\\', '.', get_class($instance)) . '.' . $method . '.pre'
                        )
                    );
                }
            );
        }
        foreach ($postInterceptors as $method) {
            $proxy->setMethodSuffixInterceptor(
                $method,
                function () use ($method, $instance) {
                    $this->eventDispatcher->dispatch(
                        (new GenericEvent($instance, ['method' => $method])),
                        strtolower(
                            str_replace('\\', '.', get_class($instance)) . '.' . $method . '.post'
                        )
                    );
                }
            );
        }

        return $proxy;
    }
}
