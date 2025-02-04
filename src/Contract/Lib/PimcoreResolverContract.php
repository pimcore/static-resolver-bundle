<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Lib;

use Pimcore;

class PimcoreResolverContract implements PimcoreResolverContractInterface
{

    public function isInstalled(): bool
    {
        return Pimcore::isInstalled();
    }

    public function inAdmin(): bool
    {
        return Pimcore::inAdmin();
    }

    public function inDevMode(): bool
    {
        return Pimcore::inDevMode();
    }
}
