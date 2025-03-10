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
use Pimcore\Model\Document;
use Pimcore\Model\Element\ElementInterface;

interface DataObjectServiceResolverContractInterface
{
    public function useInheritedValues(bool $inheritValues, callable $fn, array $fnArgs = []): mixed;

    public function rewriteIds(AbstractObject $object, array $rewriteConfig, array $params = []): AbstractObject;

    /**
     * @throws Exception
     */
    public function createFolderByPath(
        string $path,
        array $options = []
    ): Asset\Folder|DataObject\Folder|Document\Folder|null;

    public function pathExists(string $path, ?string $type = null): bool;

    /**
     * @param Data[] $targetList
     */
    public function extractFieldDefinitions(
        Data|Layout $layout,
        string $targetClass,
        array $targetList,
        bool $insideDataType
    ): array;

    public function getSuperLayoutDefinition(Concrete $object): mixed;

    public function createSuperLayout(Data|Layout $layout): void;

    /**
     * @return Concrete[]
     */
    public function getObjectsReferencingUser(int $userId): array;

    public function getLanguagePermissions(
        FieldCollectionData|ObjectBrickData|AbstractObject $object,
        Model\User $user,
        string $type
    ): ?array;

    public function calculateCellValue(
        AbstractObject $object,
        array $helperDefinitions,
        string $key,
        array $context = []
    ): mixed;

    public function getLayoutPermissions(string $classId, ?array $permissionSet = null): ?array;

    public function getFieldForBrickType(ClassDefinition $class, string $bricktype): int|string|null;

    public function hasInheritableParentObject(Concrete $object): ?Concrete;

    public function loadAllObjectFields(AbstractObject $object): void;

    public function getOptionsForSelectField(
        string|Concrete $object,
        ClassDefinition\Data\Multiselect|ClassDefinition\Data\Select|string $definition
    ): array;

    public function getOptionsForMultiSelectField(
        string|Concrete $object,
        ClassDefinition\Data\Multiselect|ClassDefinition\Data\Select|string $fieldname
    ): array;

    public function getValidLayouts(Concrete $object): array;

    public function synchronizeCustomLayout(ClassDefinition\CustomLayout $customLayout): void;

    public function cloneDefinition(mixed $definition): mixed;

    public function getUniqueKey(ElementInterface $element, int $nr = 0): string;

    public function getCalculatedFieldValue(
        Fieldcollection\Data\AbstractData|Objectbrick\Data\AbstractData|Concrete $object,
        ?CalculatedValue $data
    ): mixed;

    public function getSystemFields(): array;

    public function doResetDirtyMap(Model\AbstractModel $container, ClassDefinition|ClassDefinition\Data $fd): void;

    public function recursiveResetDirtyMap(AbstractObject $object): void;

    public function doHideUnpublished(?ElementInterface $element): bool;

    public function getElementByPath(string $type, string $path): ?ElementInterface;

    public function getSafeCopyName(string $sourceKey, ElementInterface $target): string;

    public function getElementById(string $type, int|string $id, array $params = []
    ): Asset|Document|AbstractObject|null;

    public function getElementType(ElementInterface $element): ?string;

    public function getValidKey(string $key, string $type): string;

    public function isValidKey(string $key, string $type): bool;

    public function isValidPath(string $path, string $type): bool;

    public function cloneMe(ElementInterface $element): ElementInterface;

    public function cloneProperties(mixed $properties): mixed;

    public function getElementFromSession(string $type, int $elementId, string $sessionId, ?string $postfix = ''
    ): Asset|Document|AbstractObject|null;

    public function locateDaoClass(string $modelClass): ?string;
}
