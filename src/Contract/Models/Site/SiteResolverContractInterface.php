<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Site;

use Exception;
use Pimcore\Model\Site;

interface SiteResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getCurrentSite(): Site;

    public function setCurrentSite(Site $site): void;

    public function getByRootId(int $id): ?Site;

    public function create(array $data): Site;

    /**
     * @throws Exception
     */
    public function getById(int $id): ?Site;

    public function isSiteRequest(): bool;

    /**
     * @throws Exception
     */
    public function getBy(mixed $mixed): ?Site;

    /**
     * @throws Exception
     */
    public function getByDomain(string $domain): ?Site;

    public function locateDaoClass(string $modelClass): ?string;
}
