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

    public function getLanguages(): array
    {
        return Admin::getLanguages();
    }
}
