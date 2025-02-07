<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Element;

use Pimcore\Model\Element\Note;

class NoteResolverContract implements NoteResolverContractInterface
{

    public function getById(int $id): ?Note
    {
        return Note::getById($id);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Note::locateDaoClass($modelClass);
    }
}
