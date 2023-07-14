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

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Traits\GetProxy;
use Pimcore\Model\User;

class UserResolver implements UserResolverInterface
{

    use GetProxy;

    public function __construct(
        protected readonly RemoteObjectFactoryInterface $remoteObjectFactory
    )
    {
    }

    public function getById(int $id, ?string $interface = null): ?object
    {
        return $this->getDecoratorProxy($interface, User::getById($id));
    }

    public function getByName(string $name, ?string $interface = null): ?object
    {
        return $this->getDecoratorProxy($interface, User::getByName($name));
    }

    public function create(array $values = [], ?string $interface = null): object
    {
        return $this->getDecoratorProxy($interface, User::create($values));
    }

    public function getUserRoleById(int $id, ?string $interface = null): ?object
    {
        return $this->getDecoratorProxy($interface, User\UserRole::getById($id));
    }

    public function getUserRoleByName(string $name, ?string $interface = null): ?object
    {
        return $this->getDecoratorProxy($interface, User\UserRole::getByName($name));
    }

    public function createUserRole(array $values = [], ?string $interface = null): object
    {
        return $this->getDecoratorProxy($interface, User\UserRole::create($values));
    }
}
