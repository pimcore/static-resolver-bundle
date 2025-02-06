<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject;

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Listing;

interface ConcreteObjectResolverContractInterface
{
    public function getById(int $id, array $params = []): null|Concrete;

    public function classId(): string;

    public function getHideUnpublished(): bool;

    public function setHideUnpublished(bool $hideUnpublished): void;

    public function doHideUnpublished(): bool;

    public function setGetInheritedValues(bool $getInheritedValues): void;

    public function getGetInheritedValues(): ?bool;

    public function doGetInheritedValues(?Concrete $object = null): bool;

    public function getTypes(): array;

    public function getByPath(string $path, array $params = []): AbstractObject|null;

    /**
     * @throws \Exception
     */
    public function getList(array $config = []): Listing;

    public function doNotRestoreKeyAndPath(): bool;

    public function setDoNotRestoreKeyAndPath(bool $doNotRestoreKeyAndPath): void;

    public function locateDaoClass(string $modelClass): ?string;
}
