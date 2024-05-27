<?php

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