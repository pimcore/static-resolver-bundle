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
use Pimcore\Document;
use Pimcore\Document\AdapterInterface;

/**
 * @internal
 */
final class DocumentResolver implements DocumentResolverInterface
{
    /**
     * @throws Exception
     */
    public function getInstance(?string $adapter = null): ?AdapterInterface
    {
        return Document::getInstance($adapter);
    }

    public function isAvailable(): bool
    {
        return Document::isAvailable();
    }

    public function isFileTypeSupported(string $filetype): bool
    {
        return Document::isFileTypeSupported($filetype);
    }

    public function getDefaultAdapter(): ?AdapterInterface
    {
        return Document::getDefaultAdapter();
    }
}
