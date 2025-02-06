<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;
use Pimcore\Model\DataObject\ClassDefinition\Service;
use Pimcore\Model\DataObject\Fieldcollection\Definition as FCDefinition;
use Pimcore\Model\DataObject\ObjectBrick\Definition as OBDefinition;

class ClassDefinitionServiceResolverContract implements ClassDefinitionServiceResolverContractInterface
{

    public function importClassDefinitionFromJson(
        ClassDefinition $class,
        string $json,
        bool $throwException = false,
        bool $ignoreId = false
    ): bool
    {
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
    ): bool
    {
        return Service::importFieldCollectionFromJson($fieldCollection, $json, $throwException);
    }

    public function importObjectBrickFromJson(
        OBDefinition $objectBrick,
        string $json,
        bool $throwException = false
    ): bool
    {
        return Service::importObjectBrickFromJson($objectBrick, $json, $throwException);
    }
}
