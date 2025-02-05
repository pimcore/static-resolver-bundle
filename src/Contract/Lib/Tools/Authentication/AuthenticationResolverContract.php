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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Tools\Authentication;

use Pimcore\Model\User;
use Pimcore\Tool\Authentication;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationResolverContract implements AuthenticationResolverContractInterface
{
    public function authenticateSession(?Request $request = null): ?User
    {
        return Authentication::authenticateSession($request);
    }

    public function verifyPassword(User $user, string $password): bool
    {
        return Authentication::verifyPassword($user, $password);
    }

    public function isValidUser(?User $user): bool
    {
        return Authentication::isValidUser($user);
    }

    public function authenticateToken(string $token, bool $adminRequired = false): ?User
    {
        return Authentication::authenticateToken($token, $adminRequired);
    }
}
