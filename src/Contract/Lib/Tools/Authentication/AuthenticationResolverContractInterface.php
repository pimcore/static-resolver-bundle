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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Tools\Authentication;

use Pimcore\Model\User;
use Symfony\Component\HttpFoundation\Request;

/**
 * @internal
 */
interface AuthenticationResolverContractInterface
{
    public function authenticateSession(?Request $request = null): ?User;

    public function verifyPassword(User $user, string $password): bool;

    public function isValidUser(?User $user): bool;

    public function authenticateToken(string $token, bool $adminRequired = false): ?User;
}
