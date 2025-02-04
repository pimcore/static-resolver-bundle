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

namespace Pimcore\Bundle\StaticResolverBundle\Lib;

use Exception;
use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\ConfigResolverContractInterface;

/**
 * @internal
 */
interface ConfigResolverInterface extends ConfigResolverContractInterface
{
    public function locateConfigFile(string $name): string;

    public function getSystemConfiguration(?string $offset = null): ?array;

    public function getWebsiteConfigRuntimeCacheKey(?string $language = null): string;

    /**
     * @throws Exception
     */
    public function getReportConfig(): array;

    public function inPerspective(array $runtimeConfig, string $key): bool;

    /**
     * @throws Exception
     */
    public function getConfigInstance(string $file): array;
}
