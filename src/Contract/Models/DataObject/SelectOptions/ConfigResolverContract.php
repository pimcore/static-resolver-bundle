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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\SelectOptions;

use Pimcore\Model\DataObject\SelectOptions\Config;

class ConfigResolverContract implements ConfigResolverContractInterface
{
    public function getById(string $id): ?Config
    {
        return Config::getById($id);
    }

    public function createFromData(array $data): Config
    {
        return Config::createFromData($data);
    }
}
