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
interface PredefinedResolverInterface
{
    public function getById(string $id): ?Predefined;

    public function getByKey(string $key): ?Predefined;

    public function create(): Predefined;
}
