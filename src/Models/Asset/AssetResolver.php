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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Asset;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Listing;

/**
 * @internal
 */
final class AssetResolver implements AssetResolverInterface
{
    public function getById(int|string $id, array $params = []): ?Asset
    {
        return Asset::getById($id, $params);
    }

    public function getByPath(string $path, array $params = []): ?Asset
    {
        return Asset::getByPath($path, $params);
    }

    public function create(int $parentId, array $data = [], bool $save = true): Asset
    {
        return Asset::create($parentId, $data, $save);
    }

    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Asset::getList($config);
    }

    public function getTypes(): array
    {
        return Asset::getTypes();
    }
}
