<?php
declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyEvent;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference\SmartReferenceFactoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EventProxyService implements EventProxyServiceInterface
{
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly SmartReferenceFactoryInterface $smartReferenceFactory
    ) {
    }

    public function getEventDispatcherProxy(
        object $instance,
        array $preInterceptors = [],
        array $postInterceptors = [],
        ?string $customEventName = null
    ): object {
        $proxy = $this->smartReferenceFactory->createProxy($instance);
        $this->addPreInterceptors($preInterceptors, $proxy, $customEventName);
        $this->addPostInterceptors($postInterceptors, $proxy, $customEventName);

        return $proxy;
    }

    private function addPreInterceptors(array $preInterceptors, object $proxy, ?string $customEventName): void
    {
        foreach ($preInterceptors as $method) {
            $proxy->setMethodPrefixInterceptor(
                $method,
                function ($proxy, $instance, $method, $params, & $returnEarly) use ($customEventName): mixed {
                    $event = new ProxyEvent(
                        $instance,
                        compact('method', 'params', 'returnEarly')
                    );
                    $this->eventDispatcher->dispatch($event, $this->getEventName($instance, $method, 'pre'));
                    if ($customEventName) {
                        $this->eventDispatcher->dispatch($event, strtolower($customEventName) . '.pre');
                    }

                    if ($event->hasResponse()) {
                        $returnEarly = true;

                        return $event->getResponse();
                    }

                    return null;
                }
            );
        }
    }

    private function addPostInterceptors(array $postInterceptors, object $proxy, ?string $customEventName): void
    {
        foreach ($postInterceptors as $method) {
            $proxy->setMethodSuffixInterceptor(
                $method,
                function (
                    $proxy,
                    $instance,
                    $method,
                    $params,
                    $returnValue,
                    & $returnEarly
                ) use ($customEventName): mixed {
                    $event = new ProxyEvent(
                        $instance,
                        compact('method', 'params', 'returnValue', 'returnEarly')
                    );
                    $this->eventDispatcher->dispatch($event, $this->getEventName($instance, $method, 'post'));
                    if ($customEventName) {
                        $this->eventDispatcher->dispatch($event, strtolower($customEventName) . '.post');
                    }

                    if ($event->hasResponse()) {
                        $returnEarly = true;

                        return $event->getResponse();
                    }

                    return null;
                }
            );
        }
    }

    private function getEventName(object $instance, mixed $method, string $prefix): string
    {
        return strtolower(
            str_replace('\\', '.', get_class($instance)) . '.' . $method . '.' . $prefix
        );
    }
}
