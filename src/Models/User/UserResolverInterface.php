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

interface UserResolverInterface
{
    public function getById(int $id, ?string $interface): ?object;

    public function getByName(string $name, ?string $interface): ?object;

    public function create(array $values = []): object;

    public function getUserRoleById(int $id, ?string $interface): ?object;

    public function getUserRoleByName(string $name, ?string $interface): ?object;

    public function createUserRole(array $values = []): object;
}
