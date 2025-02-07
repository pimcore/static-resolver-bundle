<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Element;

use Pimcore\Model\Element\Note;

interface NoteResolverContractInterface
{
    public function getById(int $id): ?Note;

    public function locateDaoClass(string $modelClass): ?string;
}
