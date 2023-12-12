<?php

namespace Pimcore\Bundle\StaticResolverBundle\Models\User\Permission;

use Pimcore\Model\User\Permission;

interface DefinitionResolverInterface
{
    public function getByKey(string $permission): ?Permission\Definition;
    public function create(string $permission): Permission\Definition;
}