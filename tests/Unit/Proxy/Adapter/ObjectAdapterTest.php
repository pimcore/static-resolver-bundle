<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Proxy\Adapter;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\ObjectAdapter;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Adapter\Remote\ObjectAdapterInterface;

class ObjectAdapterTest extends Unit
{
    #[Group('adapter')]
    #[Group('proxy')]
    public function testObjectAdapter(): void
    {
        $object = new class {
            public function test(): string
            {
                return 'testCallResult';
            }
        };
        $adapter = new ObjectAdapter($object);
        static::assertInstanceOf(ObjectAdapterInterface::class, $adapter);
        static::assertEquals('testCallResult', $adapter->call('test', 'test'));
    }
}
