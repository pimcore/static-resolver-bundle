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

namespace Pimcore\Bundle\StaticResolverBundle\Models\RecycleBin;

use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\Element\Recyclebin\Item;
use Pimcore\Model\User;

/**
 * @internal
 */
final class ItemResolver implements ItemResolverInterface
{
    public function create(ElementInterface $element, User $user = null): void
    {
        Item::create($element, $user);
    }

    public function getById(int $id): ?Item
    {
        return Item::getById($id);
    }
}
