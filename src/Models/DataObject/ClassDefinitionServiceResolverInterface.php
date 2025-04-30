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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject;

use Exception;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinitionServiceResolverContractInterface;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Layout;

/**
 * @internal
 */
interface ClassDefinitionServiceResolverInterface extends ClassDefinitionServiceResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function generateLayoutTreeFromArray(
        array $array,
        bool $throwException = false,
        bool $insideLocalizedField = false
    ): bool|Data|Layout;

    public function setDoRemoveDynamicOptions(bool $doRemoveDynamicOptions): void;

    public function updateTableDefinitions(array &$tableDefinitions, array $tableNames): void;

    public function skipColumn(
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
    public function buildImplementsInterfacesCode(array $implementsParts, ?string $newInterfaces): string;

    /**
     * @throws Exception
     */
    public function buildUseTraitsCode(array $useParts, ?string $newTraits): string;

    /**
     * @throws Exception
     */
    public function buildUseCode(array $useParts): string;

    public function buildFieldConstantsCode(Data ...$fieldDefinitions): string;

    public function buildFieldConstantCode(Data $fieldDefinition): string;

    public function camelCaseToUpperSnakeCase(string $camelCase): string;
}
