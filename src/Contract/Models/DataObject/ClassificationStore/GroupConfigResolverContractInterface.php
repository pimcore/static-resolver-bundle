<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassificationStore;

use Exception;
use Pimcore\Model\DataObject\Classificationstore\GroupConfig;

interface GroupConfigResolverContractInterface
{
    public function create(): GroupConfig;

    public function getById(int $id, ?bool $force = false): ?GroupConfig;

    /**
     * @throws Exception
     */
    public function getByName(string $name, int $storeId = 1, ?bool $force = false): ?GroupConfig;

    public function locateDaoClass(string $modelClass): ?string;
}
