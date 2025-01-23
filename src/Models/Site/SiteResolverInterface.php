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
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\StaticResolverBundle\Models\Site;

use Pimcore\Model\Site;

interface SiteResolverInterface
{
    public function getById(int $id): ?Site;

    public function getByRootId(int $id): ?Site;

    public function getByDomain(string $domain): ?Site;

    public function getBy(mixed $mixed): ?Site;

    public function create(array $data): Site;

    public function isSiteRequest(): bool;

    public function getCurrentSite(): Site;

    public function setCurrentSite(Site $site): void;
}
