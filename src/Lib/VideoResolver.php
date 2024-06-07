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

namespace Pimcore\Bundle\StaticResolverBundle\Lib;

use Exception;
use Pimcore\Video;
use Pimcore\Video\Adapter;

final class VideoResolver implements VideoResolverInterface
{
    /**
     * @throws Exception
     */
    public function getInstance(): ?Adapter
    {
        return Video::getInstance();
    }

    public function isAvailable(): bool
    {
        return Video::isAvailable();
    }
}
