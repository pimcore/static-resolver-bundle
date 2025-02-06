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
