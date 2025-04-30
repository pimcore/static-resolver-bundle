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

use Exception;
use Pimcore\Document\Adapter;

/**
 * @internal
 */
interface DocumentResolverInterface
{
    /**
     * @throws Exception
     */
    public function getInstance(?string $adapter = null): ?Adapter;

    public function isAvailable(): bool;

    public function isFileTypeSupported(string $filetype): bool;

    public function getDefaultAdapter(): ?Adapter;
}
