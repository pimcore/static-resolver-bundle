<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document;

use Exception;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Listing;

interface DocumentResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function getByPath(string $path, array $params = []): ?Document;

    public function setHideUnpublished(bool $hideUnpublished): void;

    public function getTypes(): array;

    public function create(int $parentId, array $data = [], bool $save = true): Document;

    public function getById(int|string $id, array $params = []): ?Document;

    public function getTypesConfiguration(): array;

    public function doHideUnpublished(): bool;

    public function locateDaoClass(string $modelClass): ?string;
}
