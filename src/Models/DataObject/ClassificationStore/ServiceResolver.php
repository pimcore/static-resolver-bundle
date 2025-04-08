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

use Exception;
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
