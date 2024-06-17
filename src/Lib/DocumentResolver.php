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

use Exception;
use Pimcore\Document;
use Pimcore\Document\Adapter;

/**
 * @internal
 */
final class DocumentResolver
{
    /**
     * @throws Exception
     */
    public function getInstance(string $adapter = null): Adapter
    {
        Document::getInstance($adapter);
    }

    public function isAvailable(): bool
    {
        Document::isAvailable();
    }

    public function isFileTypeSupported(string $filetype): bool
    {
        return Document::isFileTypeSupported($filetype);
    }

    public function getDefaultAdapter(): ?Adapter
    {
        return Document::getDefaultAdapter();
    }
}
