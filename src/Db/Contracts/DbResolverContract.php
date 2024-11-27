<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Db\Contracts;

use Doctrine\DBAL\Connection;

class DbResolverContract implements DbResolverContractInterface
{
    public function __construct(private readonly DbResolverContractInterface $dbResolver)
    {
    }

    public function getConnection(): Connection
    {
        return $this->dbResolver->getConnection();
    }

    public function reset(): Connection
    {
        return $this->dbResolver->reset();
    }

    public function get(): Connection
    {
        return $this->dbResolver->get();
    }

    public function close(): void
    {
        $this->dbResolver->close();
    }
}
