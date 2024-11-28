<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Db\Contracts;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Db\Contracts\DbResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Db\DbResolverInterface;

class DbResolverContractTest extends Unit
{

    #[Group('db')]
    public function testGetConnection(): void
    {
        $dbResolver = $this->createMock(DbResolverInterface::class);
        $dbResolver->expects(self::once())->method('getConnection');

        $contract = new DbResolverContract($dbResolver);
        $contract->getConnection();
    }

    #[Group('db')]
    public function testReset(): void
    {
        $dbResolver = $this->createMock(DbResolverInterface::class);
        $dbResolver->expects(self::once())->method('reset');

        $contract = new DbResolverContract($dbResolver);
        $contract->reset();
    }

    #[Group('db')]
    public function testGet(): void
    {
        $dbResolver = $this->createMock(DbResolverInterface::class);
        $dbResolver->expects(self::once())->method('get');

        $contract = new DbResolverContract($dbResolver);
        $contract->get();
    }

    #[Group('db')]
    public function testClose(): void
    {
        $dbResolver = $this->createMock(DbResolverInterface::class);
        $dbResolver->expects(self::once())->method('close');

        $contract = new DbResolverContract($dbResolver);
        $contract->close();
    }
}
