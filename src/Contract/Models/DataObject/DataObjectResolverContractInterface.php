<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Exception;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Listing;

interface DataObjectResolverContractInterface
{
    public function getById(int $id, array $params = []): null|DataObject;

    public function getHideUnpublished(): bool;

    public function setHideUnpublished(bool $hideUnpublished): void;

    public function doHideUnpublished(): bool;

    public function setGetInheritedValues(bool $getInheritedValues): void;

    public function getGetInheritedValues(): ?bool;

    public function doGetInheritedValues(?DataObject $object = null): bool;

    public function getTypes(): array;

    public function getByPath(string $path, array $params = []): DataObject\AbstractObject|null;

    /**
     * @throws Exception
     */
    public function getList(array $config = []): Listing;

    public function doNotRestoreKeyAndPath(): bool;

    public function setDoNotRestoreKeyAndPath(bool $doNotRestoreKeyAndPath): void;

    public function locateDaoClass(string $modelClass): ?string;
}
