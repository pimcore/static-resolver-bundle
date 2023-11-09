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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Listing;

interface DataObjectResolverInterface
{
    public function getById(int|string $id, array $params = []): ?DataObject;

    public function getByPath(string $path, array $params = []): ?DataObject;

    public function getList(array $config = []): Listing;

    public function getTypes(): array;
}