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

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

use InvalidArgumentException;

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
