<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Listing;

class AssetResolverContract implements AssetResolverContractInterface
{

    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Asset::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Asset
    {
        return Asset::getByPath($path, $params);
    }

    public function getTypes(): array
    {
        return Asset::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Asset
    {
        return Asset::create($parentId, $data, $save);
    }

    public function getById(int|string $id, array $params = []): ?Asset
    {
        return Asset::getById($id, $params);
    }

    public function locateDaoClass(string $modelClass): string
    {
        return Asset::locateDaoClass($modelClass);
    }
}
