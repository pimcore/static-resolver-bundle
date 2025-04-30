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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\User;

use Pimcore\Model\User;

interface UserResolverContractInterface
{
    public function create(array $values = []): User;

    public function getById(int $id): ?User;

    public function getByName(string $name): ?User;

    public function locateDaoClass(string $modelClass): ?string;
}
