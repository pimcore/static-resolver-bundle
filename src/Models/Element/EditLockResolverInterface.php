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

namespace Pimcore\Bundle\StaticResolverBundle\Models\Element;

use Pimcore\Model\Element\Editlock;

/**
 * @internal
 */
interface EditLockResolverInterface
{
    public function isLocked(int $cid, string $ctype, string $sessionId): bool;

    public function lock(int $cid, string $ctype, string $sessionId): Editlock|bool;

    public function unlock(int $cid, string $ctype): bool;

    public function getByElement(int $cid, string $ctype): ?Editlock;

    public function clearSession(string $sessionId): ?bool;
}
