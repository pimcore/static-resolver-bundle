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

namespace Pimcore\Bundle\StaticResolverBundle\Lib\Tools\Authentication;

use Pimcore\Model\User;
use Pimcore\Tool\Authentication;
use Symfony\Component\HttpFoundation\Request;

final class AuthenticationResolver implements AuthenticationResolverInterface
{
    public function authenticateSession(Request $request = null): ?User
    {
        return Authentication::authenticateSession($request);
    }

    public function generateTokenByUser(User $user): string
    {
        return Authentication::generateTokenByUser($user);
    }

    public function verifyPassword(User $user, string $password): bool
    {
        return Authentication::verifyPassword($user, $password);
    }

    public function generateToken(string $username): string
    {
        return Authentication::generateToken($username);
    }

    public function getPasswordHash(string $username, string $plainTextPassword): string
    {
        return Authentication::getPasswordHash($username, $plainTextPassword);
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
