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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Version;

use Pimcore\Model\Version;

class VersionResolverContract implements VersionResolverContractInterface
{
    public function disable(): void
    {
        Version::disable();
    }

    public function getById(int $id): ?Version
    {
        return Version::getById($id);
    }

    public function isEnabled(): bool
    {
        return Version::isEnabled();
    }

    public function enable(): void
    {
        Version::enable();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Version::locateDaoClass($modelClass);
    }
}
