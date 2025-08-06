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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Audio;
use Pimcore\Model\Asset\Listing;

interface AudioResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function getByPath(string $path, array $params = []): ?Audio;

    public function getTypes(): array;

    public function create(int $parentId, array $data = [], bool $save = true): Asset;

    public function getById(int $id, array $params = []): ?Audio;
}