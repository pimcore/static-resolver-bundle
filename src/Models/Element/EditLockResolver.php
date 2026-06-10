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
final class EditLockResolver implements EditLockResolverInterface
{
    public function isLocked(int $cid, string $ctype, string $sessionId): bool
    {
        return Editlock::isLocked($cid, $ctype, $sessionId);
    }

    public function lock(int $cid, string $ctype, string $sessionId): Editlock|bool
    {
        return Editlock::lock($cid, $ctype, $sessionId);
    }

    public function unlock(int $cid, string $ctype): bool
    {
        return Editlock::unlock($cid, $ctype);
    }

    public function getByElement(int $cid, string $ctype): ?Editlock
    {
        return Editlock::getByElement($cid, $ctype);
    }

    public function clearSession(string $sessionId): ?bool
    {
        return Editlock::clearSession($sessionId);
    }
}
