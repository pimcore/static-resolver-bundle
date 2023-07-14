<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData;

class TestUser implements TestUserInterface
{

    public function getFirstName(): string
    {
       return 'John';
    }

    public function getLastName(): string
    {
       return 'Doe';
    }

    public function __call($name, $arguments)
    {
        return $name;
    }
}