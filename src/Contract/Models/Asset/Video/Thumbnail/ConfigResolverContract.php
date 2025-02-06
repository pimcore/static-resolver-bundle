<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Video\Thumbnail;

use Exception;
use Pimcore\Model\Asset\Video\Thumbnail\Config;

class ConfigResolverContract implements ConfigResolverContractInterface
{

    /**
     * @throws Exception
     */
    public function getByName(string $name): ?Config
    {
        return Config::getByName($name);
    }

    public function locateDaoClass(string $modelClass): string
    {
        return Config::locateDaoClass($modelClass);
    }
}
