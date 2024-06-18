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

namespace Pimcore\Bundle\StaticResolverBundle\Lib\Tools;

use Pimcore\Model\User;
use Pimcore\Tool\Admin;

/**
 * @internal
 */
final class AdminResolver implements AdminResolverInterface
{
    public function reorderWebsiteLanguages(
        User $user,
        array|string $languages,
        bool $returnLanguageArray = false
    ): array|string {
        return Admin::reorderWebsiteLanguages($user, $languages, $returnLanguageArray);
    }
}
