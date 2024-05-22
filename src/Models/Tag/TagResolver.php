<?php

namespace Pimcore\Bundle\StaticResolverBundle\Models\Tag;

use Pimcore\Model\Element\Tag;

class TagResolver
{
    public function getById(int $id): ?Tag
    {
        return Tag::getById($id);
    }
}