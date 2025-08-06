<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Assets;

use Codeception\Attribute\Group;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\AudioResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools\ContractAbstractTest;
use Pimcore\Model\Asset\Audio;

#[Group('contract')]
class AudioResolverTest extends ContractAbstractTest
{
    public array $exludeMethodsForReturnTypeCheck = ['getByPath', 'getById', 'create'];
    
    public array $excludedMethods = ['getTypeFromMimeMapping', 'locateDaoClass'];

    protected function getClassToTest(): string {
        return Audio::class;
    }

    protected function getContractToTest(): string {
        return AudioResolverContract::class;
    }
}