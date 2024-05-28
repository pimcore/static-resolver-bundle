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
use Pimcore\Mail;

interface ToolResolverInterface
{
    public function getValidLanguages(): array;

    /**
     * @throws Exception
     */
    public function getSupportedLocales(): array;

    public function getDefaultLanguage(): ?string;

    /**
     * @throws Exception
     */
    public function getMail(array|string $recipients = null, string $subject = null): Mail;
}
