<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Version;

use Pimcore\Model\Version;

class VersionResolverContract
{

    public function disable(): void
    {
        Version::disable();
    }

    public function getById(int $id): ?Version
    {
        return Version::getById($id);
    }

    public function isEnabled(): bool
    {
        return Version::isEnabled();
    }

    public function enable(): void
    {
        Version::enable();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Version::locateDaoClass($modelClass);
    }
}
