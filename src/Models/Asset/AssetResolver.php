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

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\AssetResolverContract;
use Pimcore\Model\Asset;

/**
 * @internal
 */
final class AssetResolver extends AssetResolverContract implements AssetResolverInterface
{
    public function getTypeFromMimeMapping(string $mimeType, string $filename): string
    {
        return Asset::getTypeFromMimeMapping($mimeType, $filename);
    }
}
