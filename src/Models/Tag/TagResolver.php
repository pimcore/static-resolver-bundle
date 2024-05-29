<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Models\Tag;

use Pimcore\Model\Element\Tag;

class TagResolver implements TagResolverInterface
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

    public function assignTagToElement(string $cType, int $cId, Tag $tag): void
    {
        Tag::addTagToElement($cType, $cId, $tag);
    }

    public function unassignTagFromElement(string $cType, int $cId, Tag $tag): void
    {
        Tag::removeTagFromElement($cType, $cId, $tag);
    }

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchAssignTagsToElements(string $cType, array $cIds, array $tagIds): void
    {
        Tag::batchAssignTagsToElement($cType, $cIds, $tagIds);
    }

    /**
     * @param array<int, int> $cIds
     * @param array<int, int> $tagIds
     */
    public function batchReplaceTagsForElements(string $cType, array $cIds, array $tagIds): void
    {
        Tag::batchAssignTagsToElement($cType, $cIds, $tagIds, true);
    }
}
