<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Proxy\Events;

interface MethodeArgumentsInterceptorInterface
{
    public function getMethodArguments(): array;

    public function agrumentExists(string $key): bool;

    public function getMethodArgument(string $key): mixed;

    public function getReturnValue(): mixed;
}