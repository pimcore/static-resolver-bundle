<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\TestData;

interface TestUserBInterface
{
    public function getFirstName(): string;

    public function getId(): string;
}
