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
use Symfony\Component\HttpFoundation\Request;

/**
 * @internal
 */
final class ToolResolver extends ToolResolverContract implements ToolResolverInterface
{
    public function hasCurrentRequest(): bool
    {
        return Tool::hasCurrentRequest();
    }

    public function useFrontendOutputFilters(?Request $request = null): bool
    {
        return Tool::useFrontendOutputFilters($request);
    }

    public function getHostname(): ?string
    {
        return Tool::getHostname();
    }

    public function getRequestScheme(?Request $request = null): string
    {
        return Tool::getRequestScheme($request);
    }

    public function getClientIp(?Request $request = null): ?string
    {
        return Tool::getClientIp($request);
    }

    public function getAnonymizedClientIp(?Request $request = null): ?string
    {
        return Tool::getAnonymizedClientIp($request);
    }

    public function classExists(string $class): bool
    {
        return Tool::classExists($class);
    }

    public function interfaceExists(string $class): bool
    {
        return Tool::interfaceExists($class);
    }

    public function traitExists(string $class): bool
    {
        return Tool::traitExists($class);
    }
}
