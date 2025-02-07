<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Element;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Element\NoteResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Element\Note;

#[Group('contract')]
class NoteResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Note::class;
    }

    protected function getContractToTest(): string {
        return NoteResolverContract::class;
    }
}