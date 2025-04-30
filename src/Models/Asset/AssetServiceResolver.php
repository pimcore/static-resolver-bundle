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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Asset;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\AssetServiceResolverContract;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Service;

/**
 * @internal
 */
final class AssetServiceResolver extends AssetServiceResolverContract implements AssetServiceResolverInterface
{
    public function rewriteIds(Asset $asset, array $rewriteConfig): Asset
    {
        return Service::rewriteIds($asset, $rewriteConfig);
    }
}
