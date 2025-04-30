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

use Pimcore\Model\DataObject\QuantityValue\Unit;

interface UnitResolverContractInterface
{
    public function create(array $values = []): Unit;

    public function getByReference(string $reference): ?Unit;

    public function getById(string $id): ?Unit;

    public function getByAbbreviation(string $abbreviation): ?Unit;

    public function locateDaoClass(string $modelClass): ?string;
}
