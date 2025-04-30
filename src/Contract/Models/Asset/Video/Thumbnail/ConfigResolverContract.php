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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Video\Thumbnail;

use Exception;
use Pimcore\Model\Asset\Video\Thumbnail\Config;

class ConfigResolverContract implements ConfigResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByName(string $name): ?Config
    {
        return Config::getByName($name);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Config::locateDaoClass($modelClass);
    }
}
