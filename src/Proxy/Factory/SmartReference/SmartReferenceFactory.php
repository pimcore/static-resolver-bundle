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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\SmartReference;

use ProxyManager\Factory\AccessInterceptorValueHolderFactory;

/**
 * @deprecated Will be removed in 3.0
 */
class SmartReferenceFactory implements SmartReferenceFactoryInterface
{
    public function createProxy(object $instance): object
    {
        return (new AccessInterceptorValueHolderFactory())->createProxy($instance);
    }
}
