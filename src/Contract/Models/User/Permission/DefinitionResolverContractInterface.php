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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Permission;

use Exception;
use Pimcore\Model\User\Permission\Definition;

interface DefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function create(string $permission): Definition;

    /**
     * @throws Exception
     */
    public function getByKey(string $permission): ?Definition;

    public function locateDaoClass(string $modelClass): ?string;
}
