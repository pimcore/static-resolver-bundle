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
