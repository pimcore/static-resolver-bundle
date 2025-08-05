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

interface LinkResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function getByPath(string $path, array $params = []): ?Link;

    public function setHideUnpublished(bool $hideUnpublished): void;

    public function getTypes(): array;

    public function create(int $parentId, array $data = [], bool $save = true): Link;

    public function getById(int $id, array $params = []): ?Link;

    public function getTypesConfiguration(): array;

    public function doHideUnpublished(): bool;

    public function locateDaoClass(string $modelClass): ?string;

}
