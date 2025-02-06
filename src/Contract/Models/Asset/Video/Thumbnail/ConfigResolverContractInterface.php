<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\Video\Thumbnail;

use Exception;
use Pimcore\Model\Asset\Video\Thumbnail\Config;

interface ConfigResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getByName(string $name): ?Config;

    public function locateDaoClass(string $modelClass): string;
}
