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

interface VersionResolverContractInterface
{
    public function disable(): void;

    public function getById(int $id): ?Version;

    public function isEnabled(): bool;

    public function enable(): void;

    public function locateDaoClass(string $modelClass): ?string;
}
