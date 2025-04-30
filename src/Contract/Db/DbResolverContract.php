<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Db;

use Doctrine\DBAL\Connection;
use Pimcore\Db;

class DbResolverContract implements DbResolverContractInterface
{
    public function getConnection(): Connection
    {
        return Db::getConnection();
    }

    public function reset(): Connection
    {
        return Db::reset();
    }

    public function get(): Connection
    {
        return Db::get();
    }

    public function close(): void
    {
        Db::close();
    }
}
