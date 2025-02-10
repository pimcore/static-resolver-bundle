<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Permission;

use Exception;
use Pimcore\Model\User\Permission\Definition;

class DefinitionResolverContract implements DefinitionResolverContractInterface
{

    /**
     * @throws Exception
     */
    public function create(string $permission): Definition
    {
        return Definition::create($permission);
    }

    /**
     * @throws Exception
     */
    public function getByKey(string $permission): ?Definition
    {
        return Definition::getByKey($permission);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Definition::locateDaoClass($modelClass);
    }
}
