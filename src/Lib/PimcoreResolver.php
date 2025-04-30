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

namespace Pimcore\Bundle\StaticResolverBundle\Lib;

use Pimcore;
use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\PimcoreResolverContract;

/**
 * @internal
 */
final class PimcoreResolver extends PimcoreResolverContract implements PimcoreResolverInterface
{
    public function setAdminMode(): void
    {
        Pimcore::setAdminMode();
    }

    public function unsetAdminMode(): void
    {
        Pimcore::unsetAdminMode();
    }
}
