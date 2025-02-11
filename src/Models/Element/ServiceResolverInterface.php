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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Element;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Element\ServiceResolverContractInterface;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\User;

/**
 * @internal
 */
interface ServiceResolverInterface extends ServiceResolverContractInterface
{
    public function findForbiddenPaths(string $type, User $user): array;

    public function isPublished(?ElementInterface $element = null): bool;
}
