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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Pimcore;

class PimcoreResolverContract implements PimcoreResolverContractInterface
{
    public function isInstalled(): bool
    {
        return Pimcore::isInstalled();
    }

    public function inAdmin(): bool
    {
        return Pimcore::inAdmin();
    }

    public function inDevMode(): bool
    {
        return Pimcore::inDevMode();
    }

    public function inDebugMode(): bool
    {
        return Pimcore::inDebugMode();
    }

    public function collectGarbage(array $keepItems = []): void
    {
        Pimcore::collectGarbage($keepItems);
    }

    public function deleteTemporaryFiles(): void
    {
        Pimcore::deleteTemporaryFiles();
    }
}
