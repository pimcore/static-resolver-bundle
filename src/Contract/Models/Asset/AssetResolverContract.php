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

class AssetResolverContract implements AssetResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Asset::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Asset
    {
        return Asset::getByPath($path, $params);
    }

    public function getTypes(): array
    {
        return Asset::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Asset
    {
        return Asset::create($parentId, $data, $save);
    }

    public function getById(int $id, array $params = []): ?Asset
    {
        return Asset::getById($id, $params);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Asset::locateDaoClass($modelClass);
    }
}
