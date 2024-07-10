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

namespace Pimcore\Bundle\StaticResolverBundle\Lib\Helper;

use Exception;
use Pimcore\Mail;
use Pimcore\Model\Document;

interface MailResolverInterface
{
    /**
     * @throws Exception
     */
    public function getDebugInformation(string $type, Mail $mail): string;

    public function getDebugInformationCssStyle(): string;

    public static function formatDebugReceivers(array $receivers): string;

    /**
     * @throws Exception
     */
    public function setAbsolutePaths(string $string, ?Document $document = null, string $hostUrl = null): string;

    /**
     * @throws Exception
     */
    public static function embedAndModifyCss(string $string, ?Document $document = null): string;

    public static function parseEmailAddressField(?string $emailString): array;
}
