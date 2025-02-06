<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Listing;

interface AssetResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function getByPath(string $path, array $params = []): ?Asset;

    public function getTypes(): array;

    public function create(int $parentId, array $data = [], bool $save = true): Asset;

    public function getById(int|string $id, array $params = []): ?Asset;

    public function locateDaoClass(string $modelClass): string;
}
