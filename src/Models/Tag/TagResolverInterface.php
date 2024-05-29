<?php
declare(strict_types=1);

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
