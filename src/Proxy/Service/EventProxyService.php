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
        $this->addPreInterceptors($preInterceptors, $proxy, $instance);
        $this->addPostInterceptors($postInterceptors, $proxy, $instance);

        return $proxy;
    }

    /**
     * @param array $preInterceptors
     * @param object $proxy
     * @param object $instance
     * @return void
     */
    private function addPreInterceptors(array $preInterceptors, object $proxy, object $instance): void
    {
        foreach ($preInterceptors as $method) {
            $proxy->setMethodPrefixInterceptor(
                $method,
                function () use ($method, $instance) {
                    $this->eventDispatcher->dispatch(
                        (new GenericEvent($instance, ['method' => $method])),
                        $this->getEventName($instance, $method, 'pre')
                    );
                }
            );
        }
    }

    /**
     * @param array $postInterceptors
     * @param object $proxy
     * @param object $instance
     * @return void
     */
    private function addPostInterceptors(array $postInterceptors, object $proxy, object $instance): void
    {
        foreach ($postInterceptors as $method) {
            $proxy->setMethodSuffixInterceptor(
                $method,
                function () use ($method, $instance) {
                    $this->eventDispatcher->dispatch(
                        (new GenericEvent($instance, ['method' => $method])),
                        $this->getEventName($instance, $method, 'post')
                    );
                }
            );
        }
    }

    /**
     * @param object $instance
     * @param mixed $method
     * @param string $prefix
     * @return string
     */
    private function getEventName(object $instance, mixed $method, string $prefix): string
    {
        return strtolower(
            str_replace('\\', '.', get_class($instance)) . '.' . $method . '.' . $prefix
        );
    }
}
