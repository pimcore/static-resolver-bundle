<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Exception;
use Pimcore\Mail;
use Pimcore\Tool;

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
}
