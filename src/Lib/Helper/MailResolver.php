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
use Pimcore\Helper\Mail as MailHelper;
use Pimcore\Mail;
use Pimcore\Model\Document;

final class MailResolver implements MailResolverInterface
{
    /**
     * @throws Exception
     */
    public function getDebugInformation(string $type, Mail $mail): string
    {
        return MailHelper::getDebugInformation($type, $mail);
    }

    public function getDebugInformationCssStyle(): string
    {
        return MailHelper::getDebugInformationCssStyle();
    }

    public static function formatDebugReceivers(array $receivers): string
    {
        return MailHelper::formatDebugReceivers($receivers);
    }

    /**
     * @throws Exception
     */
    public function setAbsolutePaths(string $string, ?Document $document = null, string $hostUrl = null): string
    {
        return MailHelper::setAbsolutePaths($string, $document, $hostUrl);
    }

    /**
     * @throws Exception
     */
    public static function embedAndModifyCss(string $string, ?Document $document = null): string
    {
        return MailHelper::embedAndModifyCss($string, $document);
    }

    public static function parseEmailAddressField(?string $emailString): array
    {
        return MailHelper::parseEmailAddressField($emailString);
    }
}
