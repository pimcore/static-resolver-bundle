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
