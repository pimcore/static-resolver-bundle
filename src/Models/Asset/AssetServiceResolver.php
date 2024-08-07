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
use Pimcore\Model\Asset\Folder;
use Pimcore\Model\Asset\Service;

/**
 * @internal
 */
final class AssetServiceResolver implements AssetServiceResolverInterface
{
    public function rewriteIds(Asset $asset, array $rewriteConfig): Asset
    {
        return Service::rewriteIds($asset, $rewriteConfig);
    }

    /**
     * @throws Exception
     */
    public function createFolderByPath(string $path, array $options = []): Folder
    {
        return Service::createFolderByPath($path, $options);
    }

    public function pathExists(string $path, string $type = null): bool
    {
        return Service::pathExists($path, $type);
    }
}
