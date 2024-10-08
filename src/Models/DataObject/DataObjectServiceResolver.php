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
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\Service;

/**
 * @internal
 */
final class DataObjectServiceResolver implements DataObjectServiceResolverInterface
{
    public function useInheritedValues(
        bool $inheritValues,
        callable $fn,
        array $fnArgs = []
    ): mixed {
        return Service::useInheritedValues(
            $inheritValues,
            $fn,
            $fnArgs
        );
    }

    public function rewriteIds(AbstractObject $object, array $rewriteConfig, array $params = []): AbstractObject
    {
        return Service::rewriteIds($object, $rewriteConfig, $params);
    }

    /**
     * @throws Exception
     */
    public function createFolderByPath(string $path, array $options = []): Folder
    {
        return Service::createFolderByPath($path, $options);
    }

    public function pathExists(string $path, string $type = null): bool
    {
        return Service::pathExists($path, $type);
    }

    public function getCustomLayoutDefinitionForGridColumnConfig(ClassDefinition $class, int $objectId): array
    {
        return Service::getCustomLayoutDefinitionForGridColumnConfig($class, $objectId);
    }

    public static function enrichLayoutDefinition(
        ClassDefinition\Data|ClassDefinition\Layout|null &$layout,
        Concrete $object = null,
        array $context = []
    ): void {
        Service::enrichLayoutDefinition($layout, $object, $context);
    }
}
