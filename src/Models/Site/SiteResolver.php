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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Site;

use Exception;
use Pimcore\Model\Site;

/**
 * @interal
 */
final readonly class SiteResolver implements SiteResolverInterface
{
    /**
     * @throws Exception
     */
    public static function getById(int $id): ?Site
    {
        return Site::getById($id);
    }

    /**
     * @throws Exception
     */
    public function getCurrentSite(): Site
    {
        return Site::getCurrentSite();
    }

    public function getByRootId(int $id): ?Site
    {
        return Site::getByRootId($id);
    }

    /**
     * @throws Exception
     */
    public function getByDomain(string $domain): ?Site
    {
        return Site::getByDomain($domain);
    }

    /**
     * @throws Exception
     */
    public function getBy(mixed $mixed): ?Site
    {
        return Site::getBy($mixed);
    }

    public function create(array $data): Site
    {
        return Site::create($data);
    }

    public function isSiteRequest(): bool
    {
        return Site::isSiteRequest();
    }

    public function setCurrentSite(Site $site): void
    {
        Site::setCurrentSite($site);
    }
}
