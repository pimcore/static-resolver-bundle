<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Folder;
use Pimcore\Model\Asset\Image\ThumbnailInterface;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Document;
use Pimcore\Model\Element\ElementInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;

interface AssetServiceResolverContractInterface
{
    public function pathExists(string $path, ?string $type = null): bool;

    /**
     * @throws Exception
     */
    public function createFolderByPath(string $path, array $options = []): Folder;

    /**
     * @throws Exception
     */
    public function getUniqueKey(ElementInterface $element, int $nr = 0): string;

    /**
     * @throws Exception
     */
    public function getImageThumbnailByArrayConfig(array $config
    ): null|ThumbnailInterface|Asset\Video\ImageThumbnailInterface|Asset\Document\ImageThumbnailInterface|array;

    public function getStreamedResponseFromImageThumbnail(
        ThumbnailInterface|Asset\Video\ImageThumbnailInterface|Asset\Document\ImageThumbnailInterface|array $thumbnail,
        array $options = []
    ): StreamedResponse;

    /**
     * @throws Exception
     */
    public function getStreamedResponseByUri(string $uri): ?StreamedResponse;

    /**
     * @throws Exception
     */
    public function extractThumbnailInfoFromUri(string $uri): array;

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
