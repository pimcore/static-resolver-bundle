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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;
use Pimcore\Model\DataObject\Fieldcollection\Definition as FCDefinition;
use Pimcore\Model\DataObject\Objectbrick\Definition as OBDefinition;

interface ClassDefinitionServiceResolverContractInterface
{
    public function importClassDefinitionFromJson(
        ClassDefinition $class,
        string $json,
        bool $throwException = false,
        bool $ignoreId = false
    ): bool;

    public function generateClassDefinitionJson(ClassDefinition $class): string;

    public function generateFieldCollectionJson(FCDefinition $fieldCollection): string;

    public function generateObjectBrickJson(OBDefinition $objectBrick): string;

    public function generateCustomLayoutJson(CustomLayout $customLayout): string;

    public function importFieldCollectionFromJson(
        FCDefinition $fieldCollection,
        string $json,
        bool $throwException = false
    ): bool;

    public function importObjectBrickFromJson(OBDefinition $objectBrick, string $json, bool $throwException = false
    ): bool;
}
