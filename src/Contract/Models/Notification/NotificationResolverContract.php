<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Notification;

use Pimcore\Model\Notification;

class NotificationResolverContract implements NotificationResolverContractInterface
{

    /**
     * @throws \Exception
     */
    public function getById(int $id): ?Notification
    {
        return Notification::getById($id);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Notification::locateDaoClass($modelClass);
    }
}
