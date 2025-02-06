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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinitionServiceResolverContract;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Data\EncryptedField;
use Pimcore\Model\DataObject\ClassDefinition\Layout;
use Pimcore\Model\DataObject\ClassDefinition\Service;

/**
 * @internal
 */
final class ClassDefinitionServiceResolver extends ClassDefinitionServiceResolverContract implements ClassDefinitionServiceResolverInterface
{
    public function generateLayoutTreeFromArray(
        array $array,
        bool $throwException = false,
        bool $insideLocalizedField = false
    ): EncryptedField|bool|Data|Layout {
        return Service::generateLayoutTreeFromArray($array, $throwException, $insideLocalizedField);
    }

    public function setDoRemoveDynamicOptions(bool $doRemoveDynamicOptions): void
    {
        Service::setDoRemoveDynamicOptions($doRemoveDynamicOptions);
    }

    public function updateTableDefinitions(array &$tableDefinitions, array $tableNames): void
    {
        Service::updateTableDefinitions($tableDefinitions, $tableNames);
    }

    public function skipColumn(
        array $tableDefinitions,
        string $table,
        string $colName,
        string $type,
        string $default,
        string $null
    ): bool {
        return Service::skipColumn($tableDefinitions, $table, $colName, $type, $default, $null);
    }

    public function buildImplementsInterfacesCode(array $implementsParts, ?string $newInterfaces): string
    {
        return Service::buildImplementsInterfacesCode($implementsParts, $newInterfaces);
    }

    public function buildUseTraitsCode(array $useParts, ?string $newTraits): string
    {
        return Service::buildUseTraitsCode($useParts, $newTraits);
    }

    public function buildUseCode(array $useParts): string
    {
        return Service::buildUseCode($useParts);
    }

    public function buildFieldConstantsCode(Data ...$fieldDefinitions): string
    {
        return Service::buildFieldConstantsCode(...$fieldDefinitions);
    }

    public function buildFieldConstantCode(Data $fieldDefinition): string
    {
        return Service::buildFieldConstantCode($fieldDefinition);
    }

    public function camelCaseToUpperSnakeCase(string $camelCase): string
    {
        return Service::camelCaseToUpperSnakeCase($camelCase);
    }
}
