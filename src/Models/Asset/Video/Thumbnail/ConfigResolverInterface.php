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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Asset\Video\Thumbnail;

use Exception;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Video\Thumbnail\ConfigResolverContractInterface;
use Pimcore\Model\Asset\Video\Thumbnail\Config;

/**
 * @internal
 */
interface ConfigResolverInterface extends ConfigResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByName(string $name): ?Config;

    public function getPreviewConfig(): Config;
}
