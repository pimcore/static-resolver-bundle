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
use Symfony\Component\HttpFoundation\Request;

interface AuthenticationResolverInterface
{
    public function authenticateSession(Request $request = null): ?User;

    public function generateTokenByUser(User $user): string;

    public function verifyPassword(User $user, string $password): bool;

    public function generateToken(string $username): string;

    public function getPasswordHash(string $username, string $plainTextPassword): string;

    public function isValidUser(?User $user): bool;

    public function authenticateToken(string $token, bool $adminRequired = false): ?User;

}
