<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Folder;
use Pimcore\Model\Element\ElementInterface;

interface DocumentServiceResolverContractInterface
{
    public function pathExists(string $path, ?string $type = null): bool;

    /**
     * @throws Exception
     */
    public function createFolderByPath(string $path, array $options = []): Folder;

    public function render(
        Document\PageSnippet $document,
        array $attributes = [],
        bool $useLayout = false,
        array $query = [],
        array $options = []
    ): string;

    public function isValidType(string $type): bool;

    public function getUniqueKey(ElementInterface $element, int $nr = 0): string;

    public function doHideUnpublished(?ElementInterface $element): bool;

    public function getElementByPath(string $type, string $path): ?ElementInterface;

    public function getSafeCopyName(string $sourceKey, ElementInterface $target): string;

    public function getElementById(string $type, int|string $id, array $params = []
    ): Asset|Document|AbstractObject|null;

    public function getElementType(ElementInterface $element): ?string;

    public function getValidKey(string $key, string $type): string;

    public function isValidKey(string $key, string $type): bool;

    public function isValidPath(string $path, string $type): bool;

    public function cloneMe(ElementInterface $element): ElementInterface;

    public function cloneProperties(mixed $properties): mixed;

    public function getElementFromSession(string $type, int $elementId, string $sessionId, ?string $postfix = ''
    ): Asset|Document|AbstractObject|null;

    public function locateDaoClass(string $modelClass): ?string;
}
