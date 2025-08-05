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
use Pimcore\Model\Document\Hardlink\Wrapper\Email;
use Pimcore\Model\Document\Listing;

interface EmailResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function getByPath(string $path, array $params = []): ?Email;

    public function setHideUnpublished(bool $hideUnpublished): void;

    public function getTypes(): array;

    public function create(int $parentId, array $data = [], bool $save = true): Email;

    public function getById(int $id, array $params = []): ?Email;

    public function getTypesConfiguration(): array;

    public function doHideUnpublished(): bool;

    public function locateDaoClass(string $modelClass): ?string;

    public function setGetInheritedValues(bool $getInheritedValues): void;

    public function getGetInheritedValues(): bool;
}
