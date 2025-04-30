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

interface DbResolverContractInterface
{
    public function getConnection(): Connection;

    public function reset(): Connection;

    public function get(): Connection;

    public function close(): void;
}
