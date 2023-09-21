<?php
/** @noinspection PhpMissingParentCallCommonInspection */
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Exceptions\ReadOnlyException;
use Symfony\Component\EventDispatcher\GenericEvent;

class ProxyPostInterceptor extends GenericEvent implements ProxyPostInterceptorInterface
{
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

