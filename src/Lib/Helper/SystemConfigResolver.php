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

namespace Pimcore\Bundle\StaticResolverBundle\Lib\Helper;

use Pimcore\Config\LocationAwareConfigRepository;
use Pimcore\Helper\SystemConfig;

/**
 * @internal
 */
final class SystemConfigResolver implements SystemConfigResolverInterface
{
    public function getConfigDataByKey(LocationAwareConfigRepository $repository, string $key): array
    {
        return SystemConfig::getConfigDataByKey($repository, $key);
    }
}
