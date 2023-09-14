<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData;

class ProxyEventTestClass
{
    public function stringReturnType(): string
    {
        return 'test';
    }

    public function intReturnType(): int
    {
        return 1;
    }

    public function boolReturnType(): bool
    {
        return true;
    }

    public function floatReturnType(): float
    {
        return 1.1;
    }

    public function arrayReturnType(): array
    {
        return ['test'];
    }

    public function callableReturnType(): callable
    {
        return function () {
            return 'test';
        };
    }

    public function iterableReturnType(): iterable
    {
        return ['test'];
    }

    public function objectReturnType(): FinalTestUser
    {
        return new FinalTestUser();
    }

    public function voidReturnType(): void
    {
        return;
    }

    public function mixedReturnType(): mixed
    {
        return 'test';
    }

    public function unionReturnType(): string|int
    {
        return 'test';
    }

    public function unknownReturnType()
    {
        return 'test';
    }

    public function nullableReturnType(): ?string
    {
        return 'test';
    }
}
