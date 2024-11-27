<?php
declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

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
