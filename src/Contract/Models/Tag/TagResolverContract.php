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

class TagResolverContract implements TagResolverContractInterface
{
    public function unassignTagFromElement(string $cType, int $cId, Tag $tag): void
    {
        Tag::removeTagFromElement($cType, $cId, $tag);
    }

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchReplaceTagsForElements(string $cType, array $cIds, array $tagIds): void
    {
        Tag::batchAssignTagsToElement($cType, $cIds, $tagIds, true);
    }

    /**
     * @return array<int, Tag>
     */
    public function getTagsForElement(string $cType, int $cId): array
    {
        return Tag::getTagsForElement($cType, $cId);
    }

    public function assignTagToElement(string $cType, int $cId, Tag $tag): void
    {
        Tag::addTagToElement($cType, $cId, $tag);
    }

    public function getById(int $id): ?Tag
    {
        return Tag::getById($id);
    }

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchAssignTagsToElements(string $cType, array $cIds, array $tagIds): void
    {
        Tag::batchAssignTagsToElement($cType, $cIds, $tagIds);
    }

    public function addTagToElement(string $cType, int $cId, Tag $tag): void
    {
        Tag::addTagToElement($cType, $cId, $tag);
    }

    public function removeTagFromElement(string $cType, int $cId, Tag $tag): void
    {
        Tag::removeTagFromElement($cType, $cId, $tag);
    }

    public function setTagsForElement(string $cType, int $cId, array $tags): void
    {
        Tag::setTagsForElement($cType, $cId, $tags);
    }

    public function batchAssignTagsToElement(string $cType, array $cIds, array $tagIds, bool $replace = false): void
    {
        Tag::batchAssignTagsToElement($cType, $cIds, $tagIds, $replace);
    }

    public function getElementsForTag(
        Tag $tag,
        string $type,
        array $subtypes = [],
        array $classNames = [],
        bool $considerChildTags = false
    ): array {
        return Tag::getElementsForTag($tag, $type, $subtypes, $classNames, $considerChildTags);
    }

    public function getByPath(string $path): ?Tag
    {
        return Tag::getByPath($path);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Tag::locateDaoClass($modelClass);
    }
}
