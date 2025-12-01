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

use League\Flysystem\FilesystemOperator;

interface FileResolverContractInterface
{
    public function getValidFilename(string $tmpFilename, ?string $language = null, string $replacement = '-'): string;
    public function putPhpFile(string $path, string $data): void;
    /**
     * @return null|resource
     */
    public function getContext();
    /**
     * @param resource $context
     */
    public function setContext($context): void;
    public function getLocalTempFilePath(?string $fileExtension = null, bool $keep = false): string;
    public function recursiveDeleteEmptyDirs(FilesystemOperator $storage, string $storagePath): void;
}
