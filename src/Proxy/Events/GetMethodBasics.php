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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

use InvalidArgumentException;

/**
 * @deprecated Will be removed in 3.0
 */
trait GetMethodBasics
{
    public function getMethodName(): string
    {
        return $this->getArgument('method');
    }

    public function getMethodArguments(): array
    {
        return $this->getArgument('params');
    }

    public function agrumentExists(string $key): bool
    {
        return array_key_exists($key, $this->getArgument('params'));
    }

    public function getMethodArgument(string $key): mixed
    {
        if ($this->agrumentExists($key)) {
            return $this->getArgument('params')[$key];
        }

        throw new InvalidArgumentException(sprintf('Parameter "%s" not found.', $key));
    }

    public function getReturnValue(): mixed
    {
        return $this->getArgument('returnValue');
    }
}
