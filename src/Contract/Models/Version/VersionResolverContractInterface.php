<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Version;

use Pimcore\Model\Version;

interface VersionResolverContractInterface
{
    public function disable(): void;

    public function getById(int $id): ?Version;

    public function isEnabled(): bool;

    public function enable(): void;

    public function locateDaoClass(string $modelClass): ?string;
}
