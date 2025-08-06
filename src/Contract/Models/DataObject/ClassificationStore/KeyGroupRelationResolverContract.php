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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\Classificationstore;

use Pimcore\Model\DataObject\Classificationstore\KeyGroupRelation;

class KeyGroupRelationResolverContract implements KeyGroupRelationResolverContractInterface
{
    public function create(): KeyGroupRelation
    {
        return KeyGroupRelation::create();
    }

    public function getByGroupAndKeyId(int $groupId, int $keyId): ?KeyGroupRelation
    {
        return KeyGroupRelation::getByGroupAndKeyId($groupId, $keyId);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return KeyGroupRelation::locateDaoClass($modelClass);
    }
}