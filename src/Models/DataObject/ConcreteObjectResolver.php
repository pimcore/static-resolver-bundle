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

namespace Pimcore\Bundle\StaticResolverBundle\Models\DataObject;

use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\ConcreteObjectResolverContract;
use Pimcore\Model\DataObject\Concrete;

/**
 * @internal
 */
final class ConcreteObjectResolver extends ConcreteObjectResolverContract implements ConcreteObjectResolverInterface
{
    public function setGetInheritedProperties(bool $getInheritedProperties): void
    {
        Concrete::setGetInheritedProperties($getInheritedProperties);
    }

    public function getGetInheritedProperties(): bool
    {
        return Concrete::getGetInheritedProperties();
    }
}
