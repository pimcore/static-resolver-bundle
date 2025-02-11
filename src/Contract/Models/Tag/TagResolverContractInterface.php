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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Tag;

use Pimcore\Model\Element\Tag;

interface TagResolverContractInterface
{
    public function unassignTagFromElement(string $cType, int $cId, Tag $tag): void;

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchReplaceTagsForElements(string $cType, array $cIds, array $tagIds): void;

    /**
     * @return array<int, Tag>
     */
    public function getTagsForElement(string $cType, int $cId): array;

    public function assignTagToElement(string $cType, int $cId, Tag $tag): void;

    public function getById(int $id): ?Tag;

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchAssignTagsToElements(string $cType, array $cIds, array $tagIds): void;

    public function addTagToElement(string $cType, int $cId, Tag $tag): void;

    public function removeTagFromElement(string $cType, int $cId, Tag $tag): void;

    public function setTagsForElement(string $cType, int $cId, array $tags): void;

    public function batchAssignTagsToElement(string $cType, array $cIds, array $tagIds, bool $replace = false): void;

    public function getElementsForTag(
        Tag $tag,
        string $type,
        array $subtypes = [],
        array $classNames = [],
        bool $considerChildTags = false
    ): array;

    public function getByPath(string $path): ?Tag;

    public function locateDaoClass(string $modelClass): ?string;
}
