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

namespace Pimcore\Bundle\StaticResolverBundle\Lib\Helper;

use Exception;
use Pimcore\Mail;
use Pimcore\Model\Document;

/**
 * @internal
 */
interface MailResolverInterface
{
    /**
     * @throws Exception
     */
    public function getDebugInformation(string $type, Mail $mail): string;

    public function getDebugInformationCssStyle(): string;

    public function formatDebugReceivers(array $receivers): string;

    /**
     * @throws Exception
     */
    public function setAbsolutePaths(string $string, ?Document $document = null, ?string $hostUrl = null): string;

    /**
     * @throws Exception
     */
    public function embedAndModifyCss(string $string, ?Document $document = null): string;

    public function parseEmailAddressField(?string $emailString): array;
}
