<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

interface LocalizedFieldResolverContractInterface
{
    public function setGetFallbackValues(bool $getFallbackValues): void;

    public function getGetFallbackValues(): bool;

    public function isStrictMode(): bool;

    public function setStrictMode(bool $strictMode): void;

    public function doGetFallbackValues(): bool;

    public function locateDaoClass(string $modelClass): ?string;
}
