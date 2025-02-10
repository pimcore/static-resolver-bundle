<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\Role;

use Pimcore\Model\User\Role\Folder;

interface FolderResolverContractInterface
{
    public function create(array $values = []): Folder;

    public function getById(int $id): ?Folder;

    public function getByName(string $name): ?Folder;

    public function locateDaoClass(string $modelClass): ?string;
}
