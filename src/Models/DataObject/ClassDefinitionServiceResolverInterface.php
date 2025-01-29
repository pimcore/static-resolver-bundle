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

use Exception;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Data\EncryptedField;
use Pimcore\Model\DataObject\ClassDefinition\Layout;
use Pimcore\Model\DataObject\Fieldcollection\Definition as FCDefinition;
use Pimcore\Model\DataObject\Objectbrick\Definition as OBDefinition;

/**
 * @internal
 */
interface ClassDefinitionServiceResolverInterface
{
    /**
     * @throws Exception
     */
    public function generateLayoutTreeFromArray(
        array $array,
        bool $throwException = false,
        bool $insideLocalizedField = false
    ): EncryptedField|bool|Data|Layout;

    public static function setDoRemoveDynamicOptions(bool $doRemoveDynamicOptions): void;

    public static function generateClassDefinitionJson(ClassDefinition $class): string;

    public static function importClassDefinitionFromJson(
        ClassDefinition $class,
        string $json,
        bool $throwException = false,
        bool $ignoreId = false
    ): bool;

    public static function generateFieldCollectionJson(FCDefinition $fieldCollection): string;

    public static function importFieldCollectionFromJson(
        FCDefinition $fieldCollection,
        string $json,
        bool $throwException = false
    ): bool;

    public static function generateObjectBrickJson(OBDefinition $objectBrick): string;

    public static function generateCustomLayoutJson(CustomLayout $customLayout): string;

    public static function importObjectBrickFromJson(
        OBDefinition $objectBrick,
        string $json,
        bool $throwException = false
    ): bool;

    public static function updateTableDefinitions(array &$tableDefinitions, array $tableNames): void;

    public static function skipColumn(
        array $tableDefinitions,
        string $table,
        string $colName,
        string $type,
        string $default,
        string $null
    ): bool;

    /**
     * @param string|null $newInterfaces A comma separated list of interfaces
     *
     * @throws Exception
     */
    public static function buildImplementsInterfacesCode(array $implementsParts, ?string $newInterfaces): string;

    /**
     * @throws Exception
     */
    public static function buildUseTraitsCode(array $useParts, ?string $newTraits): string;

    /**
     * @throws Exception
     */
    public static function buildUseCode(array $useParts): string;

    public static function buildFieldConstantsCode(Data ...$fieldDefinitions): string;

    public static function buildFieldConstantCode(Data $fieldDefinition): string;

    public static function camelCaseToUpperSnakeCase(string $camelCase): string;
}
