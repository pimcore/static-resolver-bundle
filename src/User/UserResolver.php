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

namespace Pimcore\Bundle\StaticResolverBundle\User;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Factory\RemoteObject\RemoteObjectFactoryInterface;
use Pimcore\Bundle\StaticResolverBundle\User\Interfaces\UserInterface;
use Pimcore\Bundle\StaticResolverBundle\User\Interfaces\UserRoleInterface;
use Pimcore\Model\User;
use ProxyManager\Proxy\RemoteObjectInterface;

class UserResolver implements UserResolverInterface
{
    public function __construct(
        protected readonly RemoteObjectFactoryInterface $remoteObjectFactory
    )
    {
    }

    public function getReadOnlyUserById(int $id): Interfaces\ReadOnly\UserInterface
    {
        return $this->getDecoratorProxy(Interfaces\ReadOnly\UserInterface::class, User::getById($id));
    }

    public function getById(int $id): ?UserInterface
    {
        return $this->getProxy(User::getById($id));
    }

    public function getByName(string $name): ?UserInterface
    {
        return $this->getProxy(User::getByName($name));
    }

    public function create(array $values = []): UserInterface
    {
        return $this->getProxy(User::create($values));
    }

    public function getUserRoleById(int $id): ?UserRoleInterface
    {
        return $this->getProxy(User\UserRole::getById($id));
    }

    public function getUserRoleByName(string $name): ?UserRoleInterface
    {
        return $this->getProxy(User\UserRole::getByName($name));
    }

    public function createUserRole(array $values = []): UserRoleInterface
    {
        return $this->getProxy(User\UserRole::create($values));
    }

    protected function getDecoratorProxy(string $interface, ?object $user):
        Interfaces\ReadOnly\UserInterface|RemoteObjectInterface|null
    {
        if ($user === null) {
            return null;
        }
        return $this->remoteObjectFactory->createDecoratorProxy($interface, $user);
    }

    protected function getProxy(?object $user): UserInterface|UserRoleInterface|RemoteObjectInterface|null
    {
        if ($user === null) {
            return null;
        }
        return $this->remoteObjectFactory->createObjectProxy($user);
    }
}
