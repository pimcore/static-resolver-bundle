<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\Models\Element;

use Codeception\Test\Unit;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Asset\AssetServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\DataObject\DataObjectServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Document\DocumentServiceResolverContract;
use Pimcore\Bundle\StaticResolverBundle\Contract\Models\Element\ServiceResolverContract;
use Pimcore\Model\Element\AbstractElement;
use RuntimeException;

final class UseInheritedPropertiesTest extends Unit
{
    private bool $initialSetting;

    protected function _before(): void
    {
        $this->initialSetting = AbstractElement::getGetInheritedProperties();
    }

    protected function _after(): void
    {
        AbstractElement::setGetInheritedProperties($this->initialSetting);
    }

    /**
     * @return iterable<string, array{object}>
     */
    public static function resolverProvider(): iterable
    {
        yield 'element' => [new ServiceResolverContract()];
        yield 'asset' => [new AssetServiceResolverContract()];
        yield 'document' => [new DocumentServiceResolverContract()];
        yield 'data object' => [new DataObjectServiceResolverContract()];
    }

    /**
     * @dataProvider resolverProvider
     */
    public function testRunsTheCallableWithTheSettingAndRestoresIt(object $resolver): void
    {
        foreach ([true, false] as $before) {
            AbstractElement::setGetInheritedProperties($before);

            $result = $resolver->useInheritedProperties(
                !$before,
                static fn (string $prefix): string => $prefix . (AbstractElement::getGetInheritedProperties() ? 'on' : 'off'),
                ['inherited: ']
            );

            self::assertSame('inherited: ' . (!$before ? 'on' : 'off'), $result);
            self::assertSame($before, AbstractElement::getGetInheritedProperties());
        }
    }

    /**
     * @dataProvider resolverProvider
     */
    public function testRestoresTheSettingWhenTheCallableThrows(object $resolver): void
    {
        AbstractElement::setGetInheritedProperties(true);

        try {
            $resolver->useInheritedProperties(false, static function (): never {
                throw new RuntimeException('failed');
            });
            self::fail('The exception was not rethrown.');
        } catch (RuntimeException $exception) {
            self::assertSame('failed', $exception->getMessage());
        }

        self::assertTrue(AbstractElement::getGetInheritedProperties());
    }
}
