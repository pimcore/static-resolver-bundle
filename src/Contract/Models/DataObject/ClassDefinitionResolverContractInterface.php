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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Exception;
use Pimcore\Model\DataObject\ClassDefinition;

interface ClassDefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getById(string $id, bool $force = false): ?ClassDefinition;

    /**
     * @throws Exception
     */
    public function getByName(string $name): ?ClassDefinition;

    public function create(array $values = []): ClassDefinition;

    public function getByIdIgnoreCase(string $id): ClassDefinition|null;

    public function locateDaoClass(string $modelClass): ?string;
}
