<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

interface ConfigResolverContractInterface
{

    public function getEnvironment(): string;

    public function getWebsiteConfigValue(?string $key = null, mixed $default = null, ?string $language = null): mixed;

    public function getWebsiteConfig(?string $language = null): array;
}
