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

use Pimcore\Bundle\StaticResolverBundle\Proxy\Exceptions\InvalidServiceException;

interface ProxyServiceInterface
{
    /** @throws InvalidServiceException */
    public function getProxyObject(string $className, string $method, array $args = []): object|null;

    /** @throws InvalidServiceException */
    public function getStrictProxyObject(
        string $className,
        string $method,
        string $interface,
        array $args = []
    ): object|null;

    /** @throws InvalidServiceException */
    public function getDecoratorProxy(
        string $className,
        string $method,
        ?string $interface = null,
        array $args = []
    ): object|null;
}
