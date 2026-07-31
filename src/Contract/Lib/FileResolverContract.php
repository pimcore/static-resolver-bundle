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

use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use Pimcore\File;

class FileResolverContract implements FileResolverContractInterface
{
    public function getValidFilename(string $tmpFilename, ?string $language = null, string $replacement = '-'): string
    {
        return File::getValidFilename($tmpFilename, $language, $replacement);
    }

    public function putPhpFile(string $path, string $data): void
    {
        File::putPhpFile($path, $data);
    }

    public function getContext()
    {
        return File::getContext();
    }

    public function setContext($context): void
    {
        File::setContext($context);
    }

    public function getLocalTempFilePath(?string $fileExtension = null, bool $keep = false): string
    {
        return File::getLocalTempFilePath($fileExtension, $keep);
    }

    /**
     * @throws FilesystemException
     */
    public function recursiveDeleteEmptyDirs(FilesystemOperator $storage, string $storagePath): void
    {
        File::recursiveDeleteEmptyDirs($storage, $storagePath);
    }
}
