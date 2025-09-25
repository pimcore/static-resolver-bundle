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

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\DataObjectFolderResolverContract;
use Pimcore\Model\DataObject\Folder;

/**
 * @internal
 */
final class DataObjectFolderResolver extends DataObjectFolderResolverContract implements DataObjectFolderResolverInterface
{
    public function setGetInheritedProperties(bool $getInheritedProperties): void
    {
        Folder::setGetInheritedProperties($getInheritedProperties);
    }

    public function getGetInheritedProperties(): bool
    {
        return Folder::getGetInheritedProperties();
    }
}
