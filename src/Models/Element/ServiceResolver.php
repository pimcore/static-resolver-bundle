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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Element;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Document;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\Element\Service;
use Pimcore\Model\User;

final class ServiceResolver implements ServiceResolverInterface
{
    public function getElementById(string $type, int|string $id, array $params = []): Asset|Document|AbstractObject|null
    {
        return Service::getElementById($type, $id, $params);
    }

    public function getElementByPath(string $type, string $path): ?ElementInterface
    {
        return Service::getElementByPath($type, $path);
    }

    public function getElementType(ElementInterface $element): ?string
    {
        return Service::getElementType($element);
    }

    public function findForbiddenPaths(string $type, User $user): array
    {
        return Service::findForbiddenPaths($type, $user);
    }
}
