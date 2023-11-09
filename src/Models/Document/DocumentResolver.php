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

use Exception;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Listing;

/**
 * @internal
 */
final class DocumentResolver implements DocumentResolverInterface
{
    public function getById(int|string $id, array $params = []): ?Document
    {
        return Document::getById($id, $params);
    }

    public function getByPath(string $path, array $params = []): ?Document
    {
        return Document::getByPath($path, $params);
    }

    public function create(int $parentId, array $data = [], bool $save = true): Document
    {
        return Document::create($parentId, $data, $save);
    }

    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Document::getList($config);
    }

    public function getTypes(): array
    {
        return Document::getTypes();
    }
}
