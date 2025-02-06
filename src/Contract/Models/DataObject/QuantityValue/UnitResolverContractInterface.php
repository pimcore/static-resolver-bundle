<?php
declare(strict_types=1);

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
