<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData;

class TestUser implements TestUserInterface
{

    public static function getObject(): self
    {
        return new self();
    }

    public static function getNull(): ?self
    {
        return null;
    }

    public function getFirstName(): string
    {
       return 'John';
    }

    public function getLastName(): string
    {
       return 'Doe';
    }

    public function setLastName(string $name): string
    {
       return $name . '_returnValue';
    }

    private function getId(): string
    {
       return '1';
    }

    public function __call($name, $arguments)
    {
        return $name;
    }
}
