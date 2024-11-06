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

namespace Pimcore\Bundle\StaticResolverBundle\Lib;

use Pimcore;

final class PimcoreResolver implements PimcoreResolverInterface
{
    public function inDevMode(): bool
    {
        return Pimcore::inDevMode();
    }

    public function inAdmin(): bool
    {
        return Pimcore::inAdmin();
    }

    public function setAdminMode(): void
    {
        Pimcore::setAdminMode();
    }

    public function unsetAdminMode(): void
    {
        Pimcore::unsetAdminMode();
    }

    public function isInstalled(): bool
    {
        return Pimcore::isInstalled();
    }
}
