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
use Pimcore\Model\Document\Folder;
use Pimcore\Model\Document\Service;

/**
 * @internal
 */
final class DocumentServiceResolver implements DocumentServiceResolverInterface
{

    /**
     * @throws Exception
     */
    public static function createFolderByPath(string $path, array $options = []): Folder
    {
        return Service::createFolderByPath($path, $options);
    }
}