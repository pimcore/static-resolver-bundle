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

use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\ToolResolverContract;
use Pimcore\Tool;

/**
 * @internal
 */
final class ToolResolver extends ToolResolverContract implements ToolResolverInterface
{
    public function getHostname(): ?string
    {
        return Tool::getHostname();
    }
}
