<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User;

use Pimcore\Model\User\Folder;

class FolderResolverContract implements FolderResolverContractInterface
{

    public function create(array $values = []): Folder
    {
        return Folder::create($values);
    }

    public function getById(int $id): ?Folder
    {
        return Folder::getById($id);
    }

    public function getByName(string $name): ?Folder
    {
        return Folder::getByName($name);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Folder::locateDaoClass($modelClass);
    }
}
