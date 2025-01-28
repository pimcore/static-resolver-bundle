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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject\ClassDefinition\CustomLayout;

use Exception;
use Pimcore\Model\DataObject\ClassDefinition\CustomLayout;
use Symfony\Component\Uid\UuidV4;

/**
 * @internal
 */
interface CustomLayoutResolverInterface
{
    /**
     * @throws Exception
     */
    public function getById(string $customLayoutId): ?CustomLayout;

    /**
     * @throws Exception
     */
    public function getByName(string $customLayoutName): ?CustomLayout;

    /**
     * @throws Exception
     */
    public function getByNameAndClassId(string $customLayoutName, string $classId): ?CustomLayout;

    public function getIdentifier(string $classId): ?UuidV4;

    public function create(array $values): CustomLayout;
}
