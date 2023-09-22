<?php
/** @noinspection PhpMissingParentCallCommonInspection */
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
use Symfony\Component\EventDispatcher\GenericEvent;

final class ProxyPostInterceptor extends GenericEvent implements ProxyPostInterceptorInterface
{
    use GetMethodBasics;

    public function setArgument(string $key, mixed $value): static
    {
        throw new ReadOnlyException('Cannot modify event arguments after dispatch.');
    }

    public function setArguments(array $args = []): static
    {
        throw new ReadOnlyException('Cannot modify event arguments after dispatch.');
    }

    public function getSubject(): mixed
    {
        throw new ReadOnlyException('Cannot modify or get event subject after dispatch.');
    }

    public function getSubjectClass(): string
    {
        return get_class($this->subject);
    }
}
