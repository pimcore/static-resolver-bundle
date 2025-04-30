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

use Pimcore\Config;

class ConfigResolverContract implements ConfigResolverContractInterface
{
    public function getWebsiteConfigValue(
        ?string $key = null,
        mixed $default = null,
        ?string $language = null
    ): mixed {
        return Config::getWebsiteConfigValue($key, $default, $language);
    }

    public function getWebsiteConfig(?string $language = null): array
    {
        return Config::getWebsiteConfig($language);
    }

    public function getEnvironment(): string
    {
        return Config::getEnvironment();
    }
}
