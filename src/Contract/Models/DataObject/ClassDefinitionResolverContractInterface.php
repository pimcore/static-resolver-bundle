<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Exception;
use Pimcore\Model\DataObject\ClassDefinition;

interface ClassDefinitionResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getById(string $id, bool $force = false): ?ClassDefinition;

    /**
     * @throws Exception
     */
    public function getByName(string $name): ?ClassDefinition;

    public function create(array $values = []): ClassDefinition;

    public function getByIdIgnoreCase(string $id): ClassDefinition|null;

    public function locateDaoClass(string $modelClass): ?string;
}
