<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinition\CustomLayout;

use Exception;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;

class CustomLayoutResolverContract implements CustomLayoutResolverContractInterface
{

    /**
     * @throws Exception
     */
    public function getByNameAndClassId(string $customLayoutName, string $classId): ?CustomLayout
    {
        return CustomLayout::getByNameAndClassId($customLayoutName, $classId);
    }

    public function create(array $values): CustomLayout
    {
        return CustomLayout::create($values);
    }

    public function getById(string $customLayoutId): ?CustomLayout
    {
        return CustomLayout::getById($customLayoutId);
    }

    /**
     * @throws Exception
     */
    public function getByName(string $customLayoutName): ?CustomLayout
    {
        return CustomLayout::getByName($customLayoutName);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return CustomLayout::locateDaoClass($modelClass);
    }
}
