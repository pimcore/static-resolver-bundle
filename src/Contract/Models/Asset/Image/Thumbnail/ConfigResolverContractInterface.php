<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Image\Thumbnail;

use Exception;
use Pimcore\Model\Asset\Image\Thumbnail\Config;

interface ConfigResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByName(string $name): ?Config;

    public function exists(string $name): bool;

    public function locateDaoClass(string $modelClass): string;
}
