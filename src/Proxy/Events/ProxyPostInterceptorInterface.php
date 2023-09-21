<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Exceptions\ReadOnlyException;

interface ProxyPostInterceptorInterface
{
    /**
     * @throws ReadOnlyException
     */
    public function setArgument(string $key, mixed $value): static;

    /**
     * @throws ReadOnlyException
     */
    public function setArguments(array $args = []): static;

    /**
     * @throws ReadOnlyException
     */
    public function getSubject(): mixed;

    public function getSubjectClass(): string;
}
