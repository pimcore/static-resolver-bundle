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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\Hardlink\Wrapper;

use Exception;
use Pimcore\Model\Document\Hardlink\Wrapper\Link;
use Pimcore\Model\Document\Listing;

class LinkResolverContract implements LinkResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Link::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Link
    {
        return Link::getByPath($path, $params);
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Link::setHideUnpublished($hideUnpublished);
    }

    public function getTypes(): array
    {
        return Link::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Link
    {
        return Link::create($parentId, $data, $save);
    }

    public function getById(int $id, array $params = []): ?Link
    {
        return Link::getById($id, $params);
    }

    public function getTypesConfiguration(): array
    {
        return Link::getTypesConfiguration();
    }

    public function doHideUnpublished(): bool
    {
        return Link::doHideUnpublished();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Link::locateDaoClass($modelClass);
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        Link::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return Link::getGetInheritedValues();
    }
}
