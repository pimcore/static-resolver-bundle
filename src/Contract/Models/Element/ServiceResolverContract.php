<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Element;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Document;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\Element\Service;
use Pimcore\Model\DataObject;

class ServiceResolverContract implements ServiceResolverContractInterface
{

    public function getElementType(ElementInterface $element): ?string
    {
        return Service::getElementType($element);
    }

    public function getElementById(string $type, int|string $id, array $params = []): Asset|Document|AbstractObject|null
    {
        return Service::getElementById($type, $id, $params);
    }

    public function getElementByPath(string $type, string $path): ?ElementInterface
    {
        return Service::getElementByPath($type, $path);
    }

    public function getSafeCopyName(string $sourceKey, ElementInterface $target): string
    {
        return Service::getSafeCopyName($sourceKey, $target);
    }

    public function getElementFromSession(
        string $type,
        int $elementId,
        string $sessionId,
        ?string $postfix = ''
    ): null|Asset|AbstractObject|Document
    {
        return Service::getElementFromSession($type, $elementId, $sessionId, $postfix);
    }

    public function getValidKey(string $key, string $type): string
    {
        return Service::getValidKey($key, $type);
    }

    public function doHideUnpublished(?ElementInterface $element): bool
    {
        return Service::doHideUnpublished($element);
    }

    public function pathExists(string $path, ?string $type = null): bool
    {
        return Service::pathExists($path, $type);
    }

    /**
     * @throws \Exception
     */
    public function createFolderByPath(
        string $path,
        array $options = []
    ): Asset\Folder|DataObject\Folder|Document\Folder|null
    {
        return Service::createFolderByPath($path, $options);
    }

    public function isValidKey(string $key, string $type): bool
    {
        return Service::isValidKey($key, $type);
    }

    public function isValidPath(string $path, string $type): bool
    {
        return Service::isValidPath($path, $type);
    }

    public function getUniqueKey(ElementInterface $element, int $nr = 0): ?string
    {
        return Service::getUniqueKey($element, $nr);
    }

    public function cloneMe(ElementInterface $element): ElementInterface
    {
        return Service::cloneMe($element);
    }

    public function cloneProperties(mixed $properties): mixed
    {
        return Service::cloneProperties($properties);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Service::locateDaoClass($modelClass);
    }
}
