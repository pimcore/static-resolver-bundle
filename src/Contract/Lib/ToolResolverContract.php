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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Exception;
use Pimcore\Mail;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Tool;
use Symfony\Component\HttpFoundation\Request;

class ToolResolverContract implements ToolResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getMail(array|string|null $recipients = null, ?string $subject = null): Mail
    {
        return Tool::getMail($recipients, $subject);
    }

    /**
     * @throws Exception
     */
    public function getSupportedLocales(): array
    {
        return Tool::getSupportedLocales();
    }

    public function getValidLanguages(): array
    {
        return Tool::getValidLanguages();
    }

    public function getDefaultLanguage(): ?string
    {
        return Tool::getDefaultLanguage();
    }

    public function isValidLanguage(?string $language): bool
    {
        return Tool::isValidLanguage($language);
    }

    public function getRequiredLanguages(): array
    {
        return Tool::getRequiredLanguages();
    }

    public function getSupportedJSLocales(): array
    {
        return Tool::getSupportedJSLocales();
    }

    public function isFrontend(?Request $request = null): bool
    {
        return Tool::isFrontend($request);
    }

    public function isFrontendRequestByAdmin(?Request $request = null): bool
    {
        return Tool::isFrontendRequestByAdmin($request);
    }

    public function isElementRequestByAdmin(Request $request, ElementInterface $element): bool
    {
        return Tool::isElementRequestByAdmin($request, $element);
    }

    public function getHostUrl(?string $useProtocol = null, ?Request $request = null): string
    {
        return Tool::getHostUrl($useProtocol, $request);
    }

    public function getHttpData(
        string $url,
        array $paramsGet = [],
        array $paramsPost = [],
        array $options = []
    ): false|string {
        return Tool::getHttpData($url, $paramsGet, $paramsPost, $options);
    }
}
