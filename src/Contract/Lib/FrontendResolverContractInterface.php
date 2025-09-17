<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Pimcore\Model\Document;
use Pimcore\Model\Site;

interface FrontendResolverContractInterface
{
    public function isDocumentInSite(?Site $site, Document $document): bool;

    public function isDocumentInCurrentSite(Document $document): bool;

    public function getSiteForDocument(Document $document): ?Site;

    public function getSiteIdForDocument(Document $document): ?int;

    /**
     * @return false|array{enabled: true, lifetime: int|null}
     */
    public function isOutputCacheEnabled(): bool|array;
}
