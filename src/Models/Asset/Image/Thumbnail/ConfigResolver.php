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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Asset\Image\Thumbnail;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Image\Thumbnail\ConfigResolverContract;
use Pimcore\Model\Asset\Image\Thumbnail\Config;

/**
 * @internal
 */
final class ConfigResolver extends ConfigResolverContract implements ConfigResolverInterface
{
    public function getPreviewConfig(): Config
    {
        return Config::getPreviewConfig();
    }
}
