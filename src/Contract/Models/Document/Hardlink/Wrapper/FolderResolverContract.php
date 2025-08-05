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
use Pimcore\Model\Document\Hardlink\Wrapper\Folder;
use Pimcore\Model\Document\Listing;

class FolderResolverContract implements FolderResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Folder::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Folder
    {
        return Folder::getByPath($path, $params);
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Folder::setHideUnpublished($hideUnpublished);
    }

    public function getTypes(): array
    {
        return Folder::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Folder
    {
        return Folder::create($parentId, $data, $save);
    }

    public function getById(int $id, array $params = []): ?Folder
    {
        return Folder::getById($id, $params);
    }

    public function getTypesConfiguration(): array
    {
        return Folder::getTypesConfiguration();
    }

    public function doHideUnpublished(): bool
    {
        return Folder::doHideUnpublished();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Folder::locateDaoClass($modelClass);
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        Folder::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return Folder::getGetInheritedValues();
    }
}
