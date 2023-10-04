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

use Symfony\Contracts\EventDispatcher\Event;

final class ProxyPostInterceptor extends Event implements ProxyPostInterceptorInterface
{
    use GetMethodBasics;

    public function __construct(private readonly mixed $subject = null, private readonly array $arguments = [])
    {
    }

    public function getSubjectClass(): string
    {
        return get_class($this->subject);
    }

    private function getArgument(string $key): mixed
    {
        return $this->arguments[$key] ?? null;
    }
}
