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

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\User\UserResolverContractInterface;
use Pimcore\Model\User;

/**
 * @internal
 */
interface UserResolverInterface extends UserResolverContractInterface
{
    /**
     * @deprecated Use UserRoleResolver instead
     */
    public function getUserRoleById(int $id): ?User\UserRole;

    /**
     * @deprecated Use UserRoleResolver instead
     */
    public function createUserRole(array $values = []): User\UserRole;

    /**
     * @deprecated Use UserRoleResolver instead
     */
    public function getUserRoleByName(string $name): ?User\UserRole;
}
