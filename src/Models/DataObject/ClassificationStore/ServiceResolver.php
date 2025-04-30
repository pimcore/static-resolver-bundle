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

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Classificationstore\KeyConfig;
use Pimcore\Model\DataObject\Classificationstore\KeyGroupRelation;
use Pimcore\Model\DataObject\Classificationstore\Service;

/**
 * @internal
 */
final class ServiceResolver implements ServiceResolverInterface
{
    public function clearDefinitionsCache(): void
    {
        Service::clearDefinitionsCache();
    }

    public function getFieldDefinitionFromKeyConfig(
        KeyConfig|KeyGroupRelation $keyConfig
    ): ?Data {
        return Service::getFieldDefinitionFromKeyConfig($keyConfig);
    }

    public function getFieldDefinitionFromJson(array $definition, string $type): ?Data
    {
        return Service::getFieldDefinitionFromJson($definition, $type);
    }
}
