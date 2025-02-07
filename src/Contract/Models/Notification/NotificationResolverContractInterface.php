<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Notification;

use Pimcore\Model\Notification;

interface NotificationResolverContractInterface
{
    /**
     * @throws \Exception
     */
    public function getById(int $id): ?Notification;

    public function locateDaoClass(string $modelClass): ?string;
}
