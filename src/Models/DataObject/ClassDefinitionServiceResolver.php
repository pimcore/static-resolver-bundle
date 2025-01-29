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

use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Data\EncryptedField;
use Pimcore\Model\DataObject\ClassDefinition\Layout;
use Pimcore\Model\DataObject\ClassDefinition\Service;
use Pimcore\Model\DataObject\Fieldcollection\Definition as FCDefinition;
use Pimcore\Model\DataObject\ObjectBrick\Definition as OBDefinition;

/**
 * @internal
 */
final class ClassDefinitionServiceResolver implements ClassDefinitionServiceResolverInterface
{
    public function generateLayoutTreeFromArray(
        array $array,
        bool $throwException = false,
        bool $insideLocalizedField = false
    ): EncryptedField|bool|Data|Layout {
        return Service::generateLayoutTreeFromArray($array, $throwException, $insideLocalizedField);
    }

    public static function setDoRemoveDynamicOptions(bool $doRemoveDynamicOptions): void
    {
        Service::setDoRemoveDynamicOptions($doRemoveDynamicOptions);
    }

    public static function generateClassDefinitionJson(ClassDefinition $class): string
    {
        return Service::generateClassDefinitionJson($class);
    }

    public static function importClassDefinitionFromJson(
        ClassDefinition $class,
        string $json,
        bool $throwException = false,
        bool $ignoreId = false
    ): bool {
        return Service::importClassDefinitionFromJson($class, $json, $throwException, $ignoreId);
    }

    public static function generateFieldCollectionJson(FCDefinition $fieldCollection): string
    {
        return Service::generateFieldCollectionJson($fieldCollection);
    }

    public static function importFieldCollectionFromJson(
        FCDefinition $fieldCollection,
        string $json,
        bool $throwException = false
    ): bool {
        return Service::importFieldCollectionFromJson($fieldCollection, $json, $throwException);
    }

    public static function generateObjectBrickJson(OBDefinition $objectBrick): string
    {
        return Service::generateObjectBrickJson($objectBrick);
    }

    public static function generateCustomLayoutJson(CustomLayout $customLayout): string
    {
        return Service::generateCustomLayoutJson($customLayout);
    }

    public static function importObjectBrickFromJson(
        OBDefinition $objectBrick,
        string $json,
        bool $throwException = false
    ): bool {
        return Service::importObjectBrickFromJson($objectBrick, $json, $throwException);
    }

    public static function updateTableDefinitions(array &$tableDefinitions, array $tableNames): void
    {
        Service::updateTableDefinitions($tableDefinitions, $tableNames);
    }

    public static function skipColumn(
        array $tableDefinitions,
        string $table,
        string $colName,
        string $type,
        string $default,
        string $null): bool
    {
        return Service::skipColumn($tableDefinitions, $table, $colName, $type, $default, $null);
    }

    public static function buildImplementsInterfacesCode(array $implementsParts, ?string $newInterfaces): string
    {
        return Service::buildImplementsInterfacesCode($implementsParts, $newInterfaces);
    }

    public static function buildUseTraitsCode(array $useParts, ?string $newTraits): string
    {
        return Service::buildUseTraitsCode($useParts, $newTraits);
    }

    public static function buildUseCode(array $useParts): string
    {
        return Service::buildUseCode($useParts);
    }

    public static function buildFieldConstantsCode(Data ...$fieldDefinitions): string
    {
        return Service::buildFieldConstantsCode(...$fieldDefinitions);
    }

    public static function buildFieldConstantCode(Data $fieldDefinition): string
    {
        return Service::buildFieldConstantCode($fieldDefinition);
    }

    public static function camelCaseToUpperSnakeCase(string $camelCase): string
    {
        return Service::camelCaseToUpperSnakeCase($camelCase);
    }
}
