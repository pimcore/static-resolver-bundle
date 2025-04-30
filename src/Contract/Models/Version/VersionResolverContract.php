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
