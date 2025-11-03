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

use Pimcore\Version;

class VersionResolverContract implements VersionResolverContractInterface
{
    public function getMajorVersion(): int
    {
        return Version::getMajorVersion();
    }

    public static function getVersion(): string
    {
        return Version::getVersion();
    }

    public static function getRevision(): string
    {
        return Version::getRevision();
    }

    public static function getPlatformVersion(): ?string
    {
       return Version::getPlatformVersion();
    }
}
