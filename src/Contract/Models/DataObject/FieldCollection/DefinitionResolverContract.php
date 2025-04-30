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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\FieldCollection;

use Exception;
use Pimcore\Model\DataObject\Fieldcollection\Definition;

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
