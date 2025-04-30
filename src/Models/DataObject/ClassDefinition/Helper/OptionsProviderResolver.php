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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject\ClassDefinition\Helper;

use Pimcore\Model\DataObject\ClassDefinition\Helper\OptionsProviderResolver as PimcoreOptionsProviderResolver;

/**
 * @internal
 */
final class OptionsProviderResolver implements OptionsProviderResolverInterface
{
    public function resolveProvider(?string $providerClass, int $mode): ?object
    {
        return PimcoreOptionsProviderResolver::resolveProvider($providerClass, $mode);
    }
}
