<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\Objectbrick;

use Exception;
use Pimcore\Model\DataObject\Objectbrick\Definition;

class DefinitionResolverContract implements DefinitionResolverContractInterface
{

    /**
     * @throws Exception
     */
    public function getByKey(string $key): ?Definition
    {
        return Definition::getByKey($key);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Definition::locateDaoClass($modelClass);
    }
}
