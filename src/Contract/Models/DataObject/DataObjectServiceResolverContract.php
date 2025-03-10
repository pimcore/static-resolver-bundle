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

use Exception;
use Pimcore\Model;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Layout;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\Fieldcollection;
use Pimcore\Model\DataObject\Fieldcollection\Data\AbstractData as FieldCollectionData;
use Pimcore\Model\DataObject\Objectbrick;
use Pimcore\Model\DataObject\Objectbrick\Data\AbstractData as ObjectBrickData;
use Pimcore\Model\DataObject\Service;
use Pimcore\Model\Document;
use Pimcore\Model\Element\ElementInterface;

class DataObjectServiceResolverContract implements DataObjectServiceResolverContractInterface
{
    public function useInheritedValues(bool $inheritValues, callable $fn, array $fnArgs = []): mixed
    {
        return Service::useInheritedValues($inheritValues, $fn, $fnArgs);
    }

    public function rewriteIds(AbstractObject $object, array $rewriteConfig, array $params = []): AbstractObject
    {
        return Service::rewriteIds($object, $rewriteConfig, $params);
    }

    /**
     * @throws Exception
     */
    public function createFolderByPath(
        string $path,
        array $options = []
    ): Asset\Folder|DataObject\Folder|Document\Folder|null {
        return Service::createFolderByPath($path, $options);
    }

    public function pathExists(string $path, ?string $type = null): bool
    {
        return Service::pathExists($path, $type);
    }

    /**
     * @param Data[] $targetList
     */
    public function extractFieldDefinitions(
        Data|Layout $layout,
        string $targetClass,
        array $targetList,
        bool $insideDataType
    ): array {

        return Service::extractFieldDefinitions($layout, $targetClass, $targetList, $insideDataType);
    }

    public function getSuperLayoutDefinition(Concrete $object): mixed
    {

        return Service::getSuperLayoutDefinition($object);
    }

    public function createSuperLayout(Data|Layout $layout): void
    {
        Service::createSuperLayout($layout);
    }

    /**
     * @return Concrete[]
     */
    public function getObjectsReferencingUser(int $userId): array
    {
        return Service::getObjectsReferencingUser($userId);
    }

    public function getLanguagePermissions(
        FieldCollectionData|ObjectBrickData|AbstractObject $object,
        Model\User $user,
        string $type
    ): ?array {
        return Service::getLanguagePermissions($object, $user, $type);
    }

    public function calculateCellValue(
        AbstractObject $object,
        array $helperDefinitions,
        string $key,
        array $context = []
    ): mixed {
        return Service::calculateCellValue($object, $helperDefinitions, $key, $context);
    }

    public function getLayoutPermissions(string $classId, ?array $permissionSet = null): ?array
    {
        return Service::getLayoutPermissions($classId, $permissionSet);
    }

    public function getFieldForBrickType(ClassDefinition $class, string $bricktype): int|string|null
    {
        return Service::getFieldForBrickType($class, $bricktype);
    }

    public function hasInheritableParentObject(Concrete $object): ?Concrete
    {
        return Service::hasInheritableParentObject($object);
    }

    public function loadAllObjectFields(AbstractObject $object): void
    {
        Service::loadAllObjectFields($object);
    }

    public function getOptionsForSelectField(
        string|Concrete $object,
        ClassDefinition\Data\Multiselect|ClassDefinition\Data\Select|string $definition
    ): array {
        return Service::getOptionsForSelectField($object, $definition);
    }

    public function getOptionsForMultiSelectField(
        string|Concrete $object,
        ClassDefinition\Data\Multiselect|ClassDefinition\Data\Select|string $fieldname
    ): array {
        return Service::getOptionsForMultiSelectField($object, $fieldname);
    }

    public function getValidLayouts(Concrete $object): array
    {
        return Service::getValidLayouts($object);
    }

    public function synchronizeCustomLayout(ClassDefinition\CustomLayout $customLayout): void
    {
        Service::synchronizeCustomLayout($customLayout);
    }

    public function cloneDefinition(mixed $definition): mixed
    {
        return Service::cloneDefinition($definition);
    }

    public function getUniqueKey(ElementInterface $element, int $nr = 0): string
    {
        return Service::getUniqueKey($element, $nr);
    }

    public function getCalculatedFieldValue(
        Fieldcollection\Data\AbstractData|Objectbrick\Data\AbstractData|Concrete $object,
        ?CalculatedValue $data
    ): mixed {
        return Service::getCalculatedFieldValue($object, $data);
    }

    public function getSystemFields(): array
    {
        return Service::getSystemFields();
    }

    public function doResetDirtyMap(Model\AbstractModel $container, ClassDefinition|ClassDefinition\Data $fd): void
    {
        Service::doResetDirtyMap($container, $fd);
    }

    public function recursiveResetDirtyMap(AbstractObject $object): void
    {
        Service::recursiveResetDirtyMap($object);
    }

    public function doHideUnpublished(?ElementInterface $element): bool
    {
        return Service::doHideUnpublished($element);
    }

    public function getElementByPath(string $type, string $path): ?ElementInterface
    {
        return Service::getElementByPath($type, $path);
    }

    public function getSafeCopyName(string $sourceKey, ElementInterface $target): string
    {
        return Service::getSafeCopyName($sourceKey, $target);
    }

    public function getElementById(string $type, int|string $id, array $params = []): Asset|Document|AbstractObject|null
    {
        return Service::getElementById($type, $id, $params);
    }

    public function getElementType(ElementInterface $element): ?string
    {
        return Service::getElementType($element);
    }

    public function getValidKey(string $key, string $type): string
    {
        return Service::getValidKey($key, $type);
    }

    public function isValidKey(string $key, string $type): bool
    {
        return Service::isValidKey($key, $type);
    }

    public function isValidPath(string $path, string $type): bool
    {
        return Service::isValidPath($path, $type);
    }

    public function cloneMe(ElementInterface $element): ElementInterface
    {
        return Service::cloneMe($element);
    }

    public function cloneProperties(mixed $properties): mixed
    {
        return Service::cloneProperties($properties);
    }

    public function getElementFromSession(
        string $type,
        int $elementId,
        string $sessionId,
        ?string $postfix = ''
    ): Asset|Document|AbstractObject|null {
        return Service::getElementFromSession($type, $elementId, $sessionId, $postfix);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Service::locateDaoClass($modelClass);
    }
}
