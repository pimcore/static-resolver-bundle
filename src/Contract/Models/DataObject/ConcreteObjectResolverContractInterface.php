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
use Pimcore\Model\DataObject\Listing;

interface ConcreteObjectResolverContractInterface
{
    public function getById(int $id, array $params = []): null|Concrete;

    public function classId(): string;

    public function getHideUnpublished(): bool;

    public function setHideUnpublished(bool $hideUnpublished): void;

    public function doHideUnpublished(): bool;


//  BC-Break: This method will be introduced in v4.0.0
//  public function getGetInheritedProperties(): bool;

//  BC-Break: This method will be introduced in v4.0.0
//  public function setGetInheritedProperties(bool $getInheritedProperties): void;


    public function setGetInheritedValues(bool $getInheritedValues): void;

    public function getGetInheritedValues(): bool;

    public function doGetInheritedValues(?Concrete $object = null): bool;

    public function getTypes(): array;

    public function getByPath(string $path, array $params = []): AbstractObject|null;

    /**
     * @throws \Exception
     */
    public function getList(array $config = []): Listing;

    public function doNotRestoreKeyAndPath(): bool;

    public function setDoNotRestoreKeyAndPath(bool $doNotRestoreKeyAndPath): void;

    public function locateDaoClass(string $modelClass): ?string;
}
