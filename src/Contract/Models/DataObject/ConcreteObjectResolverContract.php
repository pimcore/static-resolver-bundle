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

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Listing;

class ConcreteObjectResolverContract implements ConcreteObjectResolverContractInterface
{
    public function getById(int $id, array $params = []): null|Concrete
    {
        return Concrete::getById($id, $params);
    }

    public function classId(): string
    {
        return Concrete::classId();
    }

    public function getHideUnpublished(): bool
    {
        return Concrete::getHideUnpublished();
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Concrete::setHideUnpublished($hideUnpublished);
    }

    public function doHideUnpublished(): bool
    {
        return Concrete::doHideUnpublished();
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        Concrete::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return Concrete::getGetInheritedValues();
    }

    public function doGetInheritedValues(?Concrete $object = null): bool
    {
        return Concrete::doGetInheritedValues($object);
    }

    public function getTypes(): array
    {
        return Concrete::getTypes();
    }

    public function getByPath(string $path, array $params = []): AbstractObject|null
    {
        return Concrete::getByPath($path, $params);
    }

    /**
     * @throws \Exception
     */
    public function getList(array $config = []): Listing
    {
        return Concrete::getList($config);
    }

    public function doNotRestoreKeyAndPath(): bool
    {
        return Concrete::doNotRestoreKeyAndPath();
    }

    public function setDoNotRestoreKeyAndPath(bool $doNotRestoreKeyAndPath): void
    {
        Concrete::setDoNotRestoreKeyAndPath($doNotRestoreKeyAndPath);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Concrete::locateDaoClass($modelClass);
    }
}
