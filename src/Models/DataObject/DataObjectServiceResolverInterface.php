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

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Layout;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Fieldcollection\Data\AbstractData as FieldCollectionData;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\Objectbrick\Data\AbstractData as ObjectBrickData;
use Pimcore\Model\UserInterface;

/**
 * @internal
 */
interface DataObjectServiceResolverInterface
{
    public function useInheritedValues(
        bool $inheritValues,
        callable $fn,
        array $fnArgs = []
    ): mixed;

    public function rewriteIds(AbstractObject $object, array $rewriteConfig, array $params = []): AbstractObject;

    public function createFolderByPath(string $path, array $options = []): Folder;

    public function pathExists(string $path, ?string $type = null): bool;

    public function createSuperLayout(Data|Layout $layout): void;

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

    public function getCustomLayoutDefinitionForGridColumnConfig(ClassDefinition $class, int $objectId): array;

    public function enrichLayoutDefinition(
        ClassDefinition\Data|ClassDefinition\Layout|null &$layout,
        ?Concrete $object = null,
        array $context = []
    ): void;

    public function enrichLayoutPermissions(Data &$layout, ?array $allowedView, ?array $allowedEdit): void;

    /**
     * @return Concrete[]
     */
    public function getObjectsReferencingUser(int $userId): array;

    public function getLanguagePermissions(
        FieldCollectionData|ObjectBrickData|AbstractObject $object,
        UserInterface $user,
        string $type
    ): ?array;
}
