<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinition\CustomLayout;

use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;

interface CustomLayoutResolverContractInterface
{
    public function getByNameAndClassId(string $customLayoutName, string $classId): ?CustomLayout;

    public function create(array $values): CustomLayout;

    public function getById(string $customLayoutId): ?CustomLayout;

    public function getByName(string $customLayoutName): ?CustomLayout;

    public function locateDaoClass(string $modelClass): ?string;
}
