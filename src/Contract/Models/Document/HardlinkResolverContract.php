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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document;

use Exception;
use Pimcore\Model\Document\Hardlink;
use Pimcore\Model\Document\Listing;

class HardlinkResolverContract implements HardlinkResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Hardlink::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Hardlink
    {
        return Hardlink::getByPath($path, $params);
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Hardlink::setHideUnpublished($hideUnpublished);
    }

    public function getTypes(): array
    {
        return Hardlink::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Hardlink
    {
        return Hardlink::create($parentId, $data, $save);
    }

    public function getById(int $id, array $params = []): ?Hardlink
    {
        return Hardlink::getById($id, $params);
    }

    public function getTypesConfiguration(): array
    {
        return Hardlink::getTypesConfiguration();
    }

    public function doHideUnpublished(): bool
    {
        return Hardlink::doHideUnpublished();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Hardlink::locateDaoClass($modelClass);
    }
}
