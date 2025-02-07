<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document;

use Exception;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Listing;

class DocumentResolverContract implements DocumentResolverContractInterface
{

    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing
    {
        return Document::getList($config);
    }

    public function getByPath(string $path, array $params = []): ?Document
    {
        return Document::getByPath($path, $params);
    }

    public function setHideUnpublished(bool $hideUnpublished): void
    {
        Document::setHideUnpublished($hideUnpublished);
    }

    public function getTypes(): array
    {
        return Document::getTypes();
    }

    public function create(int $parentId, array $data = [], bool $save = true): Document
    {
        return Document::create($parentId, $data, $save);
    }

    public function getById(int|string $id, array $params = []): ?Document
    {
        return Document::getById($id, $params);
    }

    public function getTypesConfiguration(): array
    {
        return Document::getTypesConfiguration();
    }

    public function doHideUnpublished(): bool
    {
        return Document::doHideUnpublished();
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Document::locateDaoClass($modelClass);
    }
}
