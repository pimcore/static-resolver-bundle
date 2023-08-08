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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote;

use BadMethodCallException;
use InvalidArgumentException;
use ReflectionException;
use ReflectionMethod;

final class StrictObjectAdapter implements ObjectAdapterInterface
{
    public function __construct(private readonly object $remoteClassOrInstance, private readonly string $interface)
    {
        if (!interface_exists($interface)) {
            throw new InvalidArgumentException(sprintf('Interface %s does not exist', $interface));
        }

        if (!$this->remoteClassOrInstance instanceof $this->interface && !$this->checkInterfaceMethods()) {
            throw new InvalidArgumentException(
                sprintf('Remote class or instance must implement %s', $this->interface)
            );
        }
    }

    /** @throws BadMethodCallException */
    public function call(string $wrappedClass, string $method, array $params = [])
    {
        return $this->remoteClassOrInstance->{$method}(...$params);
    }

    private function checkInterfaceMethods(): bool
    {
        foreach (get_class_methods($this->interface) as $method) {
            if (!method_exists($this->remoteClassOrInstance, $method) || !$this->methodIsPublic($method)) {
                return false;
            }
        }

        return true;
    }

    // Check the visibility of the method with reflection if the method is not public, return false.
    private function methodIsPublic(string $method): bool
    {
        try {
            $reflection = new ReflectionMethod($this->remoteClassOrInstance, $method);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException) {
            return false;
            // @codeCoverageIgnoreEnd
        }

        return !(!is_object($reflection) || !$reflection->isPublic());
    }
}
