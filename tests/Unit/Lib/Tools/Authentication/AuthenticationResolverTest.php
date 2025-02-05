<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Lib\Tools\Authentication;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Lib\Tools\Authentication\AuthenticationResolver;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Tool\Authentication;

#[Group('contract')]
class AuthenticationResolverTest  extends ContractAbstractTest
{

    protected function getClassToTest(): string
    {
        return Authentication::class;
    }

    protected function getContractToTest(): string
    {
        return AuthenticationResolver::class;
    }
}