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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Permission;

use Exception;
use Pimcore\Model\User\Permission\Definition;

class DefinitionResolverContract implements DefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function create(string $permission): Definition
    {
        return Definition::create($permission);
    }

    /**
     * @throws Exception
     */
    public function getByKey(string $permission): ?Definition
    {
        return Definition::getByKey($permission);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Definition::locateDaoClass($modelClass);
    }
}
