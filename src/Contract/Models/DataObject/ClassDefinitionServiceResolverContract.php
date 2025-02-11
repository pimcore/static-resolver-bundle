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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;
use Pimcore\Model\DataObject\ClassDefinition\Service;
use Pimcore\Model\DataObject\Fieldcollection\Definition as FCDefinition;
use Pimcore\Model\DataObject\Objectbrick\Definition as OBDefinition;

class ClassDefinitionServiceResolverContract implements ClassDefinitionServiceResolverContractInterface
{
    public function importClassDefinitionFromJson(
        ClassDefinition $class,
        string $json,
        bool $throwException = false,
        bool $ignoreId = false
    ): bool {
        return Service::importClassDefinitionFromJson($class, $json, $throwException, $ignoreId);
    }

    public function generateClassDefinitionJson(ClassDefinition $class): string
    {
        return Service::generateClassDefinitionJson($class);
    }

    public function generateFieldCollectionJson(FCDefinition $fieldCollection): string
    {
        return Service::generateFieldCollectionJson($fieldCollection);
    }

    public function generateObjectBrickJson(OBDefinition $objectBrick): string
    {
        return Service::generateObjectBrickJson($objectBrick);
    }

    public function generateCustomLayoutJson(CustomLayout $customLayout): string
    {
        return Service::generateCustomLayoutJson($customLayout);
    }

    public function importFieldCollectionFromJson(
        FCDefinition $fieldCollection,
        string $json,
        bool $throwException = false
    ): bool {
        return Service::importFieldCollectionFromJson($fieldCollection, $json, $throwException);
    }

    public function importObjectBrickFromJson(
        OBDefinition $objectBrick,
        string $json,
        bool $throwException = false
    ): bool {
        return Service::importObjectBrickFromJson($objectBrick, $json, $throwException);
    }
}
