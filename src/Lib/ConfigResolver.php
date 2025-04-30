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
use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\ConfigResolverContract;
use Pimcore\Config;

/**
 * @internal
 */
final class ConfigResolver extends ConfigResolverContract implements ConfigResolverInterface
{
    public function locateConfigFile(string $name): string
    {
        return Config::locateConfigFile($name);
    }

    public function getSystemConfiguration(?string $offset = null): ?array
    {
        return Config::getSystemConfiguration($offset);
    }

    public function getWebsiteConfigRuntimeCacheKey(?string $language = null): string
    {
        return Config::getWebsiteConfigRuntimeCacheKey($language);
    }

    /**
     * @throws Exception
     */
    public function getReportConfig(): array
    {
        return Config::getReportConfig();
    }

    public function inPerspective(array $runtimeConfig, string $key): bool
    {
        return Config::inPerspective($runtimeConfig, $key);
    }

    /**
     * @throws Exception
     */
    public function getConfigInstance(string $file): array
    {
        return Config::getConfigInstance($file);
    }
}
