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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Site;

use Exception;
use Pimcore\Model\Site;

class SiteResolverContract implements SiteResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getCurrentSite(): Site
    {
        return Site::getCurrentSite();
    }

    public function setCurrentSite(Site $site): void
    {
        Site::setCurrentSite($site);
    }

    public function getByRootId(int $id): ?Site
    {
        return Site::getByRootId($id);
    }

    public function create(array $data): Site
    {
        return Site::create($data);
    }

    /**
     * @throws Exception
     */
    public function getById(int $id): ?Site
    {
        return Site::getById($id);
    }

    public function isSiteRequest(): bool
    {
        return Site::isSiteRequest();
    }

    /**
     * @throws Exception
     */
    public function getBy(mixed $mixed): ?Site
    {
        return Site::getBy($mixed);
    }

    /**
     * @throws Exception
     */
    public function getByDomain(string $domain): ?Site
    {
        return Site::getByDomain($domain);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Site::locateDaoClass($modelClass);
    }
}
