<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

interface PimcoreResolverContractInterface
{
    public function inDevMode(): bool;

    public function inAdmin(): bool;

    public function isInstalled(): bool;
}
