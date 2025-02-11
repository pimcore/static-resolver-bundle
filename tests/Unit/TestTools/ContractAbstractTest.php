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

    public array $exludeMethodsForReturnTypeCheck = [];

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

            // Compare parameters
            $contractMethode = $methods[array_search($method->getName(), $methods)];
            $contractMethod = new \ReflectionMethod($this->getContractToTest(), $contractMethode);
            $contractParams = $contractMethod->getParameters();
            $classParams = $method->getParameters();

            self::assertCount(
                count($contractParams),
                $classParams,
                sprintf('Parameter count mismatch for method "%s".', $method->getName())
            );

            if (!in_array($method->getName(), $this->exludeMethodsForReturnTypeCheck, true)) {
                //Compare return types **
                $contractReturnType = $contractMethod->getReturnType();
                $classReturnType = $method->getReturnType();

                self::assertSame(
                    $contractReturnType?->__toString(),
                    $classReturnType ? $classReturnType->__toString() : null,
                    sprintf('Return type mismatch for method "%s".', $method->getName())
                );
            }

            foreach ($contractParams as $index => $contractParam) {
                $classParam = $classParams[$index];

                // Compare parameter names
                self::assertSame(
                    $contractParam->getName(), $classParam->getName(), sprintf(
                        'Parameter name mismatch at position %d in method "%s".', $index + 1, $method->getName()
                    )
                );

                // Compare types (if type-hinted)
                self::assertSame(
                    (string)$contractParam->getType(), (string)$classParam->getType(), sprintf(
                        'Parameter type mismatch for "%s" at position %d in method "%s".', $contractParam->getName(),
                        $index + 1, $method->getName()
                    )
                );

            }
        }
    }
}
