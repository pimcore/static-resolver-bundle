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

use Pimcore\Bundle\StaticResolverBundle\Proxy\Exceptions\ReadOnlyException;

interface ProxyPostInterceptorInterface
{
    /**
     * @throws ReadOnlyException
     */
    public function setArgument(string $key, mixed $value): void;

    /**
     * @throws ReadOnlyException
     */
    public function setArguments(array $args = []): void;

    /**
     * @throws ReadOnlyException
     */
    public function getSubject(): void;

    public function getSubjectClass(): string;

    public function getMethodArguments(): array;

    public function agrumentExists(string $key): bool;

    public function getMethodArgument(string $key): mixed;

    public function getReturnValue(): mixed;
}
