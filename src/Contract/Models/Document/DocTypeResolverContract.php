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

namespace Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document;

use Exception;
use Pimcore\Model\Document\DocType;

class DocTypeResolverContract implements DocTypeResolverContractInterface
{
    /**
     * @throws Exception
     */
    public function getById(string $id): ?DocType
    {
        return DocType::getById($id);
    }

    public function create(): DocType
    {
        return DocType::create();
    }
}
