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

use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\ToolResolverContractInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @internal
 */
interface ToolResolverInterface extends ToolResolverContractInterface
{
    public function hasCurrentRequest(): bool;

    public function useFrontendOutputFilters(?Request $request = null): bool;

    public function getHostname(): ?string;

    public function getRequestScheme(?Request $request = null): string;

    public function getClientIp(?Request $request = null): ?string;

    public function getAnonymizedClientIp(?Request $request = null): ?string;

    public function classExists(string $class): bool;

    public function interfaceExists(string $class): bool;

    public function traitExists(string $class): bool;
}
