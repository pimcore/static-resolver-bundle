<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

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
