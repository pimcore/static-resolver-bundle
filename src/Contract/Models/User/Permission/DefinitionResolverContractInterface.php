<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Permission;

use Exception;
use Pimcore\Model\User\Permission\Definition;

interface DefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function create(string $permission): Definition;

    /**
     * @throws Exception
     */
    public function getByKey(string $permission): ?Definition;

    public function locateDaoClass(string $modelClass): ?string;
}
