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

interface DataObjectResolverContractInterface
{
    public function getById(int $id, array $params = []): null|DataObject;

    public function getHideUnpublished(): bool;

    public function setHideUnpublished(bool $hideUnpublished): void;

    public function doHideUnpublished(): bool;

    public function setGetInheritedValues(bool $getInheritedValues): void;

    public function getGetInheritedValues(): bool;

    public function doGetInheritedValues(?Concrete $object = null): bool;

    public function getTypes(): array;

    public function getByPath(string $path, array $params = []): DataObject\AbstractObject|null;

    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function doNotRestoreKeyAndPath(): bool;

    public function setDoNotRestoreKeyAndPath(bool $doNotRestoreKeyAndPath): void;

    public function locateDaoClass(string $modelClass): ?string;
}
