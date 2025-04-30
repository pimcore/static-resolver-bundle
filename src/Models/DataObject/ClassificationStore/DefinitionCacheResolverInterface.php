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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject\ClassificationStore;

use Pimcore\Model\DataObject\Classificationstore\GroupConfig;
use Pimcore\Model\DataObject\Classificationstore\KeyConfig;

/**
 * @internal
 */
interface DefinitionCacheResolverInterface
{
    public function get(
        int $id,
        string $type = 'key'
    ): ?KeyConfig;

    public function put(GroupConfig|KeyConfig $config): void;

    public function clear(GroupConfig|KeyConfig|null $config): void;
}
