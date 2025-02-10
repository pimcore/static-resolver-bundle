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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Image\Thumbnail;

use Exception;
use Pimcore\Model\Asset\Image\Thumbnail\Config;

class ConfigResolverContract implements ConfigResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByName(string $name): ?Config
    {
        return Config::getByName($name);
    }

    public function exists(string $name): bool
    {
        return Config::exists($name);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Config::locateDaoClass($modelClass);
    }
}
