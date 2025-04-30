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
