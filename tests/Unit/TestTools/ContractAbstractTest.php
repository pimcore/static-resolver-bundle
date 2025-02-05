<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\Tests\Unit\TestTools;

use Codeception\Attribute\Group;
use Codeception\Test\Unit;

abstract class ContractAbstractTest extends Unit
{
    abstract protected function getClassToTest(): string;

    abstract protected function getContractToTest(): string;

    /**
     * Test to ensure all public and non-internal methods in the Authentication class still exist.
     * @throws \ReflectionException
     */
    public function testStaticPublicNonInternalMethodsExist(): void
    {
        $methods = get_class_methods($this->getContractToTest());
        $reflectionClass = new \ReflectionClass($this->getClassToTest());

        // Filter public and non-internal methods
        $publicNonInternalMethods = array_filter($reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC), function (\ReflectionMethod $method) {
            $docComment = $method->getDocComment();
            // Check if the method is static
            $isStatic = $method->isStatic();
            // Exclude internal with @internal annotation
            $isInternal = $docComment && str_contains($docComment, '@internal');

            return $isStatic && !$isInternal;
        });

        // Ensure all methods listed as public, non-internal exist
        foreach ($publicNonInternalMethods as $method) {
            // Static Assertion
            self::assertContains($method->getName(), $methods, sprintf('Method "%s" does not exist.', $method->getName()));
        }
    }
}
