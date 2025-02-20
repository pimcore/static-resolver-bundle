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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Exception;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Listing;

class DataObjectResolverContract implements DataObjectResolverContractInterface
{
    public function getById(int $id, array $params = []): null|DataObject
    {
        return DataObject::getById($id, $params);
    }

    public function getHideUnpublished(): bool
    {
        return DataObject::getHideUnpublished();
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        DataObject::setHideUnpublished($hideUnpublished);
    }

    public function doHideUnpublished(): bool
    {
        return DataObject::doHideUnpublished();
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        DataObject::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return DataObject::getGetInheritedValues();
    }

    public function doGetInheritedValues(?Concrete $object = null): bool
    {
        return DataObject::doGetInheritedValues($object);
    }

    public function getTypes(): array
    {
        return DataObject::getTypes();
    }

    public function getByPath(string $path, array $params = []): DataObject\AbstractObject|null
    {
        return DataObject::getByPath($path, $params);
    }

    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return DataObject::getList($config);
    }

    public function doNotRestoreKeyAndPath(): bool
    {
        return DataObject::doNotRestoreKeyAndPath();
    }

    public function setDoNotRestoreKeyAndPath(bool $doNotRestoreKeyAndPath): void
    {
        DataObject::setDoNotRestoreKeyAndPath($doNotRestoreKeyAndPath);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return DataObject::locateDaoClass($modelClass);
    }
}
