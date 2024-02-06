<?php

namespace Pimcore\Bundle\StaticResolverBundle\Models\Schedule;

use Pimcore\Model\Schedule\Task;

interface TaskResolverInterface
{
    public function getById(int $id): ?Task;

    public function create(array $data): Task;
}