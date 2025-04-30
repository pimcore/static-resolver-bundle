<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Service;

/**
 * @deprecated Will be removed in 3.0
 */
interface InterceptorProxyServiceInterface
{
    public function getEventDispatcherProxy(
        object $instance,
        array $preInterceptors = [],
        array $postInterceptors = [],
        ?string $customEventName = null
    ): object;
}
