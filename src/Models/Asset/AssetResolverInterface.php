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

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\AssetResolverContractInterface;

/**
 * @internal
 */
interface AssetResolverInterface extends AssetResolverContractInterface
{
    public function getTypeFromMimeMapping(string $mimeType, string $filename): string;
}
