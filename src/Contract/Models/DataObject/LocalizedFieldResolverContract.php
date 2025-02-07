<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Pimcore\Model\DataObject\Localizedfield;

class LocalizedFieldResolverContract implements LocalizedFieldResolverContractInterface
{

    public function setGetFallbackValues(bool $getFallbackValues): void
    {
        Localizedfield::setGetFallbackValues($getFallbackValues);
    }

    public function getGetFallbackValues(): bool
    {
        return Localizedfield::getGetFallbackValues();
    }

    public function isStrictMode(): bool
    {
        return Localizedfield::isStrictMode();
    }

    public function setStrictMode(bool $strictMode): void
    {
        Localizedfield::setStrictMode($strictMode);
    }

    public function doGetFallbackValues(): bool
    {
        return Localizedfield::doGetFallbackValues();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Localizedfield::locateDaoClass($modelClass);
    }

}
