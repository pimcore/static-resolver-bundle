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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Property\Predefined;

use Pimcore\Model\Property\Predefined;

/**
 * @internal
 */
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
