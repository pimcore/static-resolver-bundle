<?php
declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under following license:
 * - Pimcore Commercial License (PCL)
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     PCL
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
    ): array|string
    {
        return Admin::reorderWebsiteLanguages($user, $languages, $returnLanguageArray);
    }
}
