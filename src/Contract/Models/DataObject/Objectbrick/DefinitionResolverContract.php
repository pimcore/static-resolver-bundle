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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\Objectbrick;

use Exception;
use Pimcore\Model\DataObject\Objectbrick\Definition;

class DefinitionResolverContract implements DefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByKey(string $key): ?Definition
    {
        return Definition::getByKey($key);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Definition::locateDaoClass($modelClass);
    }
}
