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

use Symfony\Contracts\EventDispatcher\Event;

/**
 * @internal
 *
 * @deprecated Will be removed in 3.0
 */
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
