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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Tool;

use Pimcore\Bundle\CustomReportsBundle\Tool\Adapter\CustomReportAdapterInterface;
use Pimcore\Bundle\CustomReportsBundle\Tool\Config;
use Pimcore\Model\User;
use stdClass;

/**
 * @internal
 */
final class CustomReportResolver implements CustomReportResolverInterface
{
    public function getByName(string $name): ?Config
    {
        return Config::getByName($name);
    }

    public static function getReportsList(User $user = null): array
    {
        return Config::getReportsList($user);
    }

    public static function getAdapter(?stdClass $configuration, Config $fullConfig = null): CustomReportAdapterInterface
    {
        return Config::getAdapter($configuration, $fullConfig);
    }
}
