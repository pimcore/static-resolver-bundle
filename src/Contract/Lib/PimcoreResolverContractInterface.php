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

interface PimcoreResolverContractInterface
{
    public function isInstalled(): bool;

    public function inAdmin(): bool;

    public function inDevMode(): bool;

    public function inDebugMode(): bool;

    public function collectGarbage(): void;

    public function deleteTemporaryFiles(): void;
}
