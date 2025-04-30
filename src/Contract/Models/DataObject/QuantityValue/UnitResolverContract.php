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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\QuantityValue;

use Pimcore\Model\DataObject\Objectbrick\Definition;
use Pimcore\Model\DataObject\QuantityValue\Unit;

class UnitResolverContract implements UnitResolverContractInterface
{
    public function create(array $values = []): Unit
    {
        return Unit::create($values);
    }

    public function getByReference(string $reference): ?Unit
    {
        return Unit::getByReference($reference);
    }

    public function getById(string $id): ?Unit
    {
        return Unit::getById($id);
    }

    public function getByAbbreviation(string $abbreviation): ?Unit
    {
        return Unit::getByAbbreviation($abbreviation);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Definition::locateDaoClass($modelClass);
    }
}
