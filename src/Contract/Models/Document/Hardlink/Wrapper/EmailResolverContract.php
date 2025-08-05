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

class EmailResolverContract implements EmailResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Email::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Email
    {
        return Email::getByPath($path, $params);
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Email::setHideUnpublished($hideUnpublished);
    }

    public function getTypes(): array
    {
        return Email::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Email
    {
        return Email::create($parentId, $data, $save);
    }

    public function getById(int $id, array $params = []): ?Email
    {
        return Email::getById($id, $params);
    }

    public function getTypesConfiguration(): array
    {
        return Email::getTypesConfiguration();
    }

    public function doHideUnpublished(): bool
    {
        return Email::doHideUnpublished();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Email::locateDaoClass($modelClass);
    }

    public function setGetInheritedValues(bool $getInheritedValues): void
    {
        Email::setGetInheritedValues($getInheritedValues);
    }

    public function getGetInheritedValues(): bool
    {
        return Email::getGetInheritedValues();
    }
}
