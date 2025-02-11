<?php
declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Image\ThumbnailInterface;
use Pimcore\Model\DataObject;
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
    public function createFolderByPath(
        string $path,
        array $options = []
    ): Asset\Folder|DataObject\Folder|Document\Folder|null;

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
        array $config
    ): ?StreamedResponse;

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
