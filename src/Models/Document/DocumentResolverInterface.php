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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Document;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\DocumentResolverContractInterface;
use Pimcore\Model\Document;

/**
 * @internal
 */
interface DocumentResolverInterface extends DocumentResolverContractInterface
{
    public function createByClassName(string $className, int $parentId, array $data = [], bool $save = true): Document;

    public function setGetInheritedProperties(bool $getInheritedProperties): void;

    public function getGetInheritedProperties(): bool;
}
