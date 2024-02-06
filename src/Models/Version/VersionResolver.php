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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Version;

use Pimcore\Model\Version;

class VersionResolver implements VersionResolverInterface
{
    public function enable(): void
    {
        Version::enable();
    }

    public function disable(): void
    {
        Version::disable();
    }

    public function isEnabled(): bool
    {
        return Version::isEnabled();
    }

    public function getById(int $id): ?Version
    {
        return Version::getById($id);
    }
}
