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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Predefined;

use Pimcore\Model\Property\Predefined;

final class PredefinedResolver implements PredefinedResolverInterface
{
    public function getById(string $id): ?Predefined
    {
        return Predefined::getById($id);
    }

    public function getByKey(string $key): ?Predefined
    {
        return Predefined::getByKey($key);
    }

    public function create(): Predefined
    {
        return Predefined::create();
    }
}
