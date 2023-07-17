<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData;

class TestUserCatchStaticCalls implements TestUserInterface
{

    public static function __callStatic(string $name, array $args): self
    {
        return new self();
    }

    public function getFirstName(): string
    {
       return 'John';
    }

    public function getLastName(): string
    {
       return 'Doe';
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
