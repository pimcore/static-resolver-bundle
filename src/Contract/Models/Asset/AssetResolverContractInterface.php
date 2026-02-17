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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Listing;

interface AssetResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function getByPath(string $path, array $params = []): ?Asset;

    public function getTypes(): array;

    public function create(int $parentId, array $data = [], bool $save = true): Asset;

    public function getById(int $id, array $params = []): ?Asset;

    public function locateDaoClass(string $modelClass): ?string;

//  public function getGetInheritedProperties(): bool;

//  public function setGetInheritedProperties(bool $getInheritedProperties): void;
}
