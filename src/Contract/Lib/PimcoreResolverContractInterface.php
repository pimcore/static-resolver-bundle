<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

interface PimcoreResolverContractInterface
{
    public function isInstalled(): bool;

    public function inAdmin(): bool;

    public function inDevMode(): bool;

    public function inDebugMode(): bool;

    public function collectGarbage(): void;

    public function deleteTemporaryFiles(): void;
}
