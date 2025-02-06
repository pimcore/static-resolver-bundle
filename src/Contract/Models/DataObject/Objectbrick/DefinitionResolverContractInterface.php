<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\Objectbrick;

use Pimcore\Model\DataObject\Objectbrick\Definition;

interface DefinitionResolverContractInterface
{
    public function getByKey(string $key): ?Definition;

    public function locateDaoClass(string $modelClass): ?string;
}
