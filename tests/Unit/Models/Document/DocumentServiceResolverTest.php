<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Document;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\DocumentServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Document\Service;

#[Group('contract')]
class DocumentServiceResolverTest extends ContractAbstractTest
{
    protected function getClassToTest(): string {
        return Service::class;
    }

    protected function getContractToTest(): string {
        return DocumentServiceResolverContract::class;
    }
}