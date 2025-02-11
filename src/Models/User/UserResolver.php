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

namespace Pimcore\Bundle\StaticResolverBundle\Models\User;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\UserResolverContract;
use Pimcore\Model\User;

/**
 * @internal
 */
final class UserResolver extends UserResolverContract implements UserResolverInterface
{
    /**
     * @deprecated  Use UserRoleResolver instead
     */
    public function getUserRoleById(int $id): ?User\UserRole
    {
        return User\UserRole::getById($id);
    }

    /**
     * @deprecated Use UserRoleResolver instead
     */
    public function createUserRole(array $values = []): User\UserRole
    {
        return User\UserRole::create($values);
    }

    /**
     * @deprecated Use UserRoleResolver instead
     */
    public function getUserRoleByName(string $name): ?User\UserRole
    {
        return User\UserRole::getByName($name);
    }
}
