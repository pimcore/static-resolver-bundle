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
