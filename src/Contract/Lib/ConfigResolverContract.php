<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Pimcore\Config;

class ConfigResolverContract implements ConfigResolverContractInterface
{
    public function getWebsiteConfigValue(
        ?string $key = null,
        mixed $default = null,
        ?string $language = null
    ): mixed
    {
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
