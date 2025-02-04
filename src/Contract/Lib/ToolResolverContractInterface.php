<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Exception;
use Pimcore\Mail;

interface ToolResolverContractInterface
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
    public function getMail(array|string|null $recipients = null, ?string $subject = null): Mail;
}
