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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject\ClassificationStore;

use Pimcore\Model\DataObject\Classificationstore\DefinitionCache;
use Pimcore\Model\DataObject\Classificationstore\GroupConfig;
use Pimcore\Model\DataObject\Classificationstore\KeyConfig;

/**
 * @internal
 */
final class DefinitionCacheResolverResolver implements DefinitionCacheResolverInterface
{
    public function get(
        int $id,
        string $type = 'key'
    ): ?KeyConfig {
        return DefinitionCache::get($id, $type);
    }

    public function put(GroupConfig|KeyConfig $config): void
    {
        DefinitionCache::put($config);
    }

    public function clear(GroupConfig|KeyConfig|null $config): void
    {
        DefinitionCache::clear($config);
    }
}
