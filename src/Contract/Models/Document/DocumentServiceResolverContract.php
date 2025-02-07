<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Document\Folder;
use Pimcore\Model\Document\Service;
use Pimcore\Model\Document;
use Pimcore\Model\Element\ElementInterface;

class DocumentServiceResolverContract
{

    public function pathExists(string $path, ?string $type = null): bool
    {
        return Service::pathExists($path, $type);
    }

    /**
     * @throws Exception
     */
    public function createFolderByPath(string $path, array $options = []): Folder
    {
        return Service::createFolderByPath($path, $options);
    }

    public function render(
        Document\PageSnippet $document,
        array $attributes = [],
        bool $useLayout = false,
        array $query = [],
        array $options = []
    ): string
    {
        return Service::render($document, $attributes, $useLayout, $query, $options);
    }

    public function isValidType(string $type): bool
    {
        return Service::isValidType($type);
    }

    public function getUniqueKey(ElementInterface $element, int $nr = 0): string
    {
        return Service::getUniqueKey($element, $nr);
    }

    public function doHideUnpublished(?ElementInterface $element): bool
    {
        return Service::doHideUnpublished($element);
    }

    public function getElementByPath(string $type, string $path): ?ElementInterface
    {
        return Service::getElementByPath($type, $path);
    }

    public function getSafeCopyName(string $sourceKey, ElementInterface $target): string
    {
        return Service::getSafeCopyName($sourceKey, $target);
    }

    public function getElementById(string $type, int|string $id, array $params = []): Asset|Document|AbstractObject|null
    {
        return Service::getElementById($type, $id, $params);
    }

    public function getElementType(ElementInterface $element): ?string
    {
        return Service::getElementType($element);
    }

    public function getValidKey(string $key, string $type): string
    {
        return Service::getValidKey($key, $type);
    }

    public function isValidKey(string $key, string $type): bool
    {
        return Service::isValidKey($key, $type);
    }

    public function isValidPath(string $path, string $type): bool
    {
        return Service::isValidPath($path, $type);
    }

    public function cloneMe(ElementInterface $element): ElementInterface
    {
        return Service::cloneMe($element);
    }

    public function cloneProperties(mixed $properties): mixed
    {
        return Service::cloneProperties($properties);
    }

    public function getElementFromSession(
        string $type,
        int $elementId,
        string $sessionId,
        ?string $postfix = ''
    ): Asset|Document|AbstractObject|null
    {
        return Service::getElementFromSession($type, $elementId, $sessionId, $postfix);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Service::locateDaoClass($modelClass);
    }
}
