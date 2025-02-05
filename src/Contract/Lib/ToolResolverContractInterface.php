<?php
declare(strict_types=1);

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

    public function isValidLanguage(string $language): bool;

    public function getRequiredLanguages(): array;

    public function getSupportedJSLocales(): array;

    public function isFrontend(): bool;

    public function isFrontendRequestByAdmin(): bool;

    public function isElementRequestByAdmin(Request $request, ElementInterface $element): bool;

    public function getHostUrl(): string;

    public function getHttpData(string $url, array $paramsGet = [], array $paramsPost = [], array $options = []
    ): false|string;
}
