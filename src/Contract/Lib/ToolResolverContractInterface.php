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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Exception;
use Pimcore\Mail;
use Pimcore\Model\Element\ElementInterface;
use Symfony\Component\HttpFoundation\Request;

interface ToolResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getMail(array|string|null $recipients = null, ?string $subject = null): Mail;

    /**
     * @throws Exception
     */
    public function getSupportedLocales(): array;

    public function getValidLanguages(): array;

    public function getDefaultLanguage(): ?string;

    public function isValidLanguage(?string $language): bool;

    public function getRequiredLanguages(): array;

    public function getSupportedJSLocales(): array;

    public function isFrontend(?Request $request = null): bool;

    public function isFrontendRequestByAdmin(?Request $request = null): bool;

    public function isElementRequestByAdmin(Request $request, ElementInterface $element): bool;

    public function getHostUrl(?string $useProtocol = null, ?Request $request = null): string;

    public function getHttpData(string $url, array $paramsGet = [], array $paramsPost = [], array $options = []
    ): false|string;
}
