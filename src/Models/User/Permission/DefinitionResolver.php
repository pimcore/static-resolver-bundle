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

namespace Pimcore\Bundle\StaticResolverBundle\Models\User\Permission;

use Exception;
use Pimcore\Model\User\Permission;

/**
 * @internal
 */
final class DefinitionResolver implements DefinitionResolverInterface
{
    /**
     * @throws Exception
     */
    public function getByKey(string $permission): ?Permission\Definition
    {
        return Permission\Definition::getByKey($permission);
    }

    /**
     * @throws Exception
     */
    public function create(string $permission): Permission\Definition
    {
        return Permission\Definition::create($permission);
    }
}
