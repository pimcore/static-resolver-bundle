<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\FieldCollection;

use Exception;
use Pimcore\Model\DataObject\Fieldcollection\Definition;

interface DefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByKey(string $key): ?Definition;

    public function locateDaoClass(string $modelClass): ?string;
}
