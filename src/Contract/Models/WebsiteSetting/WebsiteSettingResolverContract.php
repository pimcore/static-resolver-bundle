<?php
declare(strict_types=1);

/**
 * This source file is available under the terms of the
 * Pimcore Open Core License (POCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (https://www.pimcore.com)
 *  @license    Pimcore Open Core License (POCL)
 */

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\WebsiteSetting;

use Exception;
use Pimcore\Model\WebsiteSetting;

class WebsiteSettingResolverContract implements WebsiteSettingResolverContractInterface
{
    public function getById(int $id): ?WebsiteSetting
    {
        return WebsiteSetting::getById($id);
    }

    /**
     * @throws Exception
     */
    public function getByName(
        string $name,
        ?int $siteId = null,
        ?string $language = null,
        ?string $fallbackLanguage = null
    ): ?WebsiteSetting {
        return WebsiteSetting::getByName($name, $siteId, $language, $fallbackLanguage);
    }
}
