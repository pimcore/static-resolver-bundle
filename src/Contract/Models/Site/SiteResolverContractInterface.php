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
