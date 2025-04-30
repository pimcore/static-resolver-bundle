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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\Listing;

class DataObjectFolderResolverContract implements DataObjectFolderResolverContractInterface
{
    public function getById(int $id, array $params = []): null|Folder
    {
        return Folder::getById($id, $params);
    }

    public function create(array $values): Folder
    {
        return Folder::create($values);
    }

    public function getHideUnpublished(): bool
    {
        return Folder::getHideUnpublished();
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Folder::setHideUnpublished($hideUnpublished);
    }

    public function doHideUnpublished(): bool
    {
        return Folder::doHideUnpublished();
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        Folder::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return Folder::getGetInheritedValues();
    }

    public function doGetInheritedValues(?Concrete $object = null): bool
    {
        return Folder::doGetInheritedValues($object);
    }

    public function getTypes(): array
    {
        return Folder::getTypes();
    }

    public function getByPath(string $path, array $params = []): AbstractObject|null
    {
        return Folder::getByPath($path, $params);
    }

    /**
     * @throws \Exception
     */
    public function getList(array $config = []): Listing
    {
        return Folder::getList($config);
    }

    public function doNotRestoreKeyAndPath(): bool
    {
        return Folder::doNotRestoreKeyAndPath();
    }

    public function setDoNotRestoreKeyAndPath(bool $doNotRestoreKeyAndPath): void
    {
        Folder::setDoNotRestoreKeyAndPath($doNotRestoreKeyAndPath);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Folder::locateDaoClass($modelClass);
    }
}
