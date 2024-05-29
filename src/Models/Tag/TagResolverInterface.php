<?php
declare(strict_types=1);

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

interface TagResolverInterface
{
    public function getById(int $id): ?Tag;

    /**
     * @return array<int, Tag>
     */
    public function getTagsForElement(string $cType, int $cId): array;

    public function assignTagToElement(string $cType, int $cId, Tag $tag): void;

    public function unassignTagFromElement(string $cType, int $cId, Tag $tag): void;

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchAssignTagsToElements(string $cType, array $cIds, array $tagIds): void;

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchReplaceTagsForElements(string $cType, array $cIds, array $tagIds): void;
}
