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
use Pimcore\Config;

/**
 * @internal
 */
final class ConfigResolver implements ConfigResolverInterface
{
    public function locateConfigFile(string $name): string
    {
        return Config::locateConfigFile($name);
    }

    public function getSystemConfiguration(string $offset = null): ?array
    {
        return Config::getSystemConfiguration($offset);
    }

    public function getWebsiteConfigRuntimeCacheKey(string $language = null): string
    {
        return Config::getWebsiteConfigRuntimeCacheKey($language);
    }

    public function getWebsiteConfig(string $language = null): array
    {
        return Config::getWebsiteConfig($language);
    }

    public function getWebsiteConfigValue(
        string $key = null,
        mixed $default = null,
        string $language = null
    ): mixed
    {
        return Config::getWebsiteConfigValue($key, $default, $language);
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

    public function getEnvironment(): string
    {
        return Config::getEnvironment();
    }

    /**
     * @throws Exception
     */
    public function getConfigInstance(string $file): array
    {
        return Config::getConfigInstance($file);
    }
}
