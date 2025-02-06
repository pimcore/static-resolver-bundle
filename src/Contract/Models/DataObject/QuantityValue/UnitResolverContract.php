<?php
declare(strict_types=1);

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
