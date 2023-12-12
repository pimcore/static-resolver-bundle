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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Document;

use Pimcore\Model\Document;
use Pimcore\Model\Document\Listing;

interface DocumentResolverInterface
{
    public function getById(int|string $id, array $params = []): ?Document;

    public function getByPath(string $path, array $params = []): ?Document;

    public function create(int $parentId, array $data = [], bool $save = true): Document;

    public function getList(array $config = []): Listing;

    public function getTypes(): array;
}
