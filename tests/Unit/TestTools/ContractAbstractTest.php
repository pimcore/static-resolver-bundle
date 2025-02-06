<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools;

use Codeception\Test\Unit;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod as ReflectionMethodAlias;

abstract class ContractAbstractTest extends Unit
{
    /**
     * @var array<string> List of method names to exclude from tests
     */
    public array $excludedMethods = [];

    abstract protected function getClassToTest(): string;

    abstract protected function getContractToTest(): string;

    /**
     * Test to ensure all public and non-internal methods in the Authentication class still exist.
     * @throws ReflectionException
     */
    public function testStaticPublicNonInternalMethodsExist(): void
    {
        $methods = get_class_methods($this->getContractToTest());
        $reflectionClass = new ReflectionClass($this->getClassToTest());

        // Filter public and non-internal methods
        $publicNonInternalMethods = array_filter(
            $reflectionClass->getMethods(
            ReflectionMethodAlias::IS_STATIC
            ),
            static function (
            ReflectionMethodAlias $method) {
            $docComment = $method->getDocComment();
            // Check if the method is public
            $isPublic = $method->isPublic();
            // Exclude internal with @internal annotation
            $isInternal = $docComment && str_contains($docComment, '@internal');

            return $isPublic && !$isInternal;
        });

        // Ensure all methods listed as public, non-internal exist
        foreach ($publicNonInternalMethods as $method) {
            if (in_array($method->getName(), $this->excludedMethods, true)) {
                continue;
            }
            // Static Assertion
            self::assertContains(
                $method->getName(),
                $methods,
                sprintf('Method "%s" does not exist.',
                    $method->getName()
                )
            );
        }
    }
}
