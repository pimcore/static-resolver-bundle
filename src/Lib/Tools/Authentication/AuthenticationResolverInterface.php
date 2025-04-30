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

use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Tools\Authentication\AuthenticationResolverContractInterface;
use Pimcore\Model\User;

/**
 * @internal
 */
interface AuthenticationResolverInterface extends AuthenticationResolverContractInterface
{
    public function generateTokenByUser(User $user): string;

    public function generateToken(string $username): string;

    public function getPasswordHash(string $username, string $plainTextPassword): string;
}
