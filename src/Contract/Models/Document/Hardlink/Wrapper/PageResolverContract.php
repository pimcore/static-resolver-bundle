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
use Pimcore\Model\Document\Hardlink\Wrapper\Page;
use Pimcore\Model\Document\Listing;

class PageResolverContract implements PageResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Page::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Page
    {
        return Page::getByPath($path, $params);
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Page::setHideUnpublished($hideUnpublished);
    }

    public function getTypes(): array
    {
        return Page::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Page
    {
        return Page::create($parentId, $data, $save);
    }

    public function getById(int $id, array $params = []): ?Page
    {
        return Page::getById($id, $params);
    }

    public function getTypesConfiguration(): array
    {
        return Page::getTypesConfiguration();
    }

    public function doHideUnpublished(): bool
    {
        return Page::doHideUnpublished();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Page::locateDaoClass($modelClass);
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        Page::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return Page::getGetInheritedValues();
    }
}
