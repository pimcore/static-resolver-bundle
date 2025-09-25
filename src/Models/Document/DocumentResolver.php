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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Document;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\DocumentResolverContract;
use Pimcore\Model\Document;

/**
 * @internal
 */
final class DocumentResolver extends DocumentResolverContract implements DocumentResolverInterface
{
    public function createByClassName(string $className, int $parentId, array $data = [], bool $save = true): Document
    {
        if (!is_subclass_of($className, Document::class)) {
            throw new \InvalidArgumentException("Class $className must extend " . Document::class);
        }

        return $className::create($parentId, $data, $save);
    }

    public function setGetInheritedProperties(bool $getInheritedProperties): void
    {
        Document::setGetInheritedProperties($getInheritedProperties);
    }

    public function getGetInheritedProperties(): bool
    {
        return Document::getGetInheritedProperties();
    }
}
