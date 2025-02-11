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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document;

use Exception;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Document;
use Pimcore\Model\Document\Service;
use Pimcore\Model\Element\ElementInterface;

class DocumentServiceResolverContract implements DocumentServiceResolverContractInterface
{
    public function pathExists(string $path, ?string $type = null): bool
    {
        return Service::pathExists($path, $type);
    }

    /**
     * @throws Exception
     */
    public function createFolderByPath(
        string $path,
        array $options = []
    ): Asset\Folder|DataObject\Folder|Document\Folder|null {
        return Service::createFolderByPath($path, $options);
    }

    public function render(
        Document\PageSnippet $document,
        array $attributes = [],
        bool $useLayout = false,
        array $query = [],
        array $options = []
    ): string {
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
    ): Asset|Document|AbstractObject|null {
        return Service::getElementFromSession($type, $elementId, $sessionId, $postfix);
    }

    public function locateDaoClass(string $modelClass): ?string
    {
        return Service::locateDaoClass($modelClass);
    }
}
