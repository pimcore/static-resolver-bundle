<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassificationStore;

use Exception;
use Pimcore\Model\DataObject\Classificationstore\GroupConfig;

class GroupConfigResolverContract implements GroupConfigResolverContractInterface
{

    public function create(): GroupConfig
    {
        return GroupConfig::create();
    }

    public function getById(int $id, ?bool $force = false): ?GroupConfig
    {
        return GroupConfig::getById($id, $force);
    }

    /**
     * @throws Exception
     */
    public function getByName(string $name, int $storeId = 1, ?bool $force = false): ?GroupConfig
    {
        return GroupConfig::getByName($name, $storeId, $force);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return GroupConfig::locateDaoClass($modelClass);
    }
}
