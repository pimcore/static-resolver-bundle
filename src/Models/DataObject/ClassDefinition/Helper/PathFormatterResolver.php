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

use Pimcore\Model\DataObject\ClassDefinition\Helper\PathFormatterResolver as PimcorePathFormatterResolver;
use Pimcore\Model\DataObject\ClassDefinition\PathFormatterInterface;

/**
 * @internal
 */
final class PathFormatterResolver implements PathFormatterResolverInterface
{
    public function resolvePathFormatter(string $formatterClass): ?PathFormatterInterface
    {
        return PimcorePathFormatterResolver::resolvePathFormatter($formatterClass);
    }
}
