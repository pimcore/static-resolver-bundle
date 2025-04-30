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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Schedule;

use Pimcore\Model\Schedule\Task;

/**
 * @internal
 */
final class TaskResolver implements TaskResolverInterface
{
    public function getById(int $id): ?Task
    {
        return Task::getById($id);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }
}
