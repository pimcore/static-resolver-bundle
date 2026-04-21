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

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\DataObjectServiceResolverContractInterface;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\Fieldcollection\Data\AbstractData as FieldCollectionData;
use Pimcore\Model\DataObject\Objectbrick\Data\AbstractData as ObjectbrickData;
use Pimcore\Model\User;

/**
 * @internal
 */
interface DataObjectServiceResolverInterface extends DataObjectServiceResolverContractInterface
{
    public function getCustomLayoutDefinitionForGridColumnConfig(
        ClassDefinition $class,
        int $objectId,
        ?User $user = null
    ): array;

    public function enrichLayoutDefinition(
        ClassDefinition\Data|ClassDefinition\Layout|null &$layout,
        ?Concrete $object = null,
        array $context = [],
        ?User $user = null
    ): void;

    public function enrichLayoutPermissions(
        Data &$layout,
        ?array $allowedView, ?
        array $allowedEdit,
        ?User $user = null
    ): void;

    public function getCalculatedFieldValue(
        FieldCollectionData|ObjectbrickData|Concrete $object,
        ?CalculatedValue $data,
    ): mixed;

    public function getCalculatedFieldValueForEditMode(
        Concrete $object,
        array $params,
        ?CalculatedValue $data,
    ): ?string;
}
