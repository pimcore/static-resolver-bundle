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

namespace Pimcore\Bundle\StaticResolverBundle\Lib\Tools\Authentication;

use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Tools\Authentication\AuthenticationResolverContract;
use Pimcore\Model\User;
use Pimcore\Tool\Authentication;

/**
 * @internal
 */
final class AuthenticationResolver extends AuthenticationResolverContract implements AuthenticationResolverInterface
{
    public function generateTokenByUser(User $user): string
    {
        return Authentication::generateTokenByUser($user);
    }

    public function generateToken(string $username): string
    {
        return Authentication::generateToken($username);
    }

    public function getPasswordHash(string $username, string $plainTextPassword): string
    {
        return Authentication::getPasswordHash($username, $plainTextPassword);
    }
}
