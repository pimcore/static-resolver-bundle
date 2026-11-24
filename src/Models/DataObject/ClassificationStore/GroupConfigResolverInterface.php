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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject\ClassificationStore;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassificationStore\GroupConfigResolverContractInterface;
use Pimcore\Model\DataObject\Classificationstore\GroupConfig;

/**
 * @internal
 */
interface GroupConfigResolverInterface extends GroupConfigResolverContractInterface
{
    public function getByIdentifier(string $identifier, int $storeId = 1): ?GroupConfig;
}
