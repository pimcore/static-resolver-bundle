<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\StaticResolverBundle\Models\Tag;

use Pimcore\Model\Element\Tag;

class TagResolver
{
    public function getById(int $id): ?Tag
    {
        return Tag::getById($id);
    }

    /**
     * @return array<int, Tag>
     */
    public function getTagsForElement(string $cType, int $cId): array
    {
        return Tag::getTagsForElement($cType, $cId);
    }
}
