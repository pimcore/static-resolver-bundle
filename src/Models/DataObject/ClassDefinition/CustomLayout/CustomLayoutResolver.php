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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject\ClassDefinition\CustomLayout;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ClassDefinition\CustomLayout\CustomLayoutResolverContract;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;
use Symfony\Component\Uid\UuidV4;

/**
 * @internal
 */
final class CustomLayoutResolver extends CustomLayoutResolverContract implements CustomLayoutResolverInterface
{
    public function getIdentifier(string $classId): ?UuidV4
    {
        return CustomLayout::getIdentifier($classId);
    }
}
