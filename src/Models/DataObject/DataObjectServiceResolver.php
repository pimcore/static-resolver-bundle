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

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\DataObjectServiceResolverContract;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Service;

/**
 * @internal
 */
final class DataObjectServiceResolver extends DataObjectServiceResolverContract implements DataObjectServiceResolverInterface
{
    public function getCustomLayoutDefinitionForGridColumnConfig(ClassDefinition $class, int $objectId): array
    {
        return Service::getCustomLayoutDefinitionForGridColumnConfig($class, $objectId);
    }

    public function enrichLayoutDefinition(
        ClassDefinition\Data|ClassDefinition\Layout|null &$layout,
        ?Concrete $object = null,
        array $context = []
    ): void {
        Service::enrichLayoutDefinition($layout, $object, $context);
    }

    public function enrichLayoutPermissions(Data &$layout, ?array $allowedView, ?array $allowedEdit): void
    {
        Service::enrichLayoutPermissions($layout, $allowedView, $allowedEdit);
    }
}
