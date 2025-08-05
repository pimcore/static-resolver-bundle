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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\Hardlink\Wrapper;

use Exception;
use Pimcore\Model\Document\Hardlink\Wrapper\Snippet;
use Pimcore\Model\Document\Listing;

class SnippetResolverContract implements SnippetResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Snippet::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Snippet
    {
        return Snippet::getByPath($path, $params);
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Snippet::setHideUnpublished($hideUnpublished);
    }

    public function getTypes(): array
    {
        return Snippet::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Snippet
    {
        return Snippet::create($parentId, $data, $save);
    }

    public function getById(int $id, array $params = []): ?Snippet
    {
        return Snippet::getById($id, $params);
    }

    public function getTypesConfiguration(): array
    {
        return Snippet::getTypesConfiguration();
    }

    public function doHideUnpublished(): bool
    {
        return Snippet::doHideUnpublished();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Snippet::locateDaoClass($modelClass);
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        Snippet::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return Snippet::getGetInheritedValues();
    }
}
