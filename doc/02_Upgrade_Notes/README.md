# Upgrade notes

## Upgrade to 2026.4.0
- Requires Pimcore 2026.4 (`pimcore/pimcore: ^2026.4`).
- Added `useInheritedProperties()` to the element, asset, document and data object service resolver contracts, it calls `Pimcore\Model\Element\Service::useInheritedProperties()`. The method is not part of the `*ServiceResolverContractInterface` interfaces yet, as adding it there would break other implementations of them.

## Upgrade to 2026.1.0
- Added support to `PHP` `8.5`.
- Removed support to `PHP` `8.3` and Symfony `v6`.

## 4.0.0
- Added getter/setter of GetInheritedProperties in element contract interfaces 

## 2.0.0
All Resolver classes and interfaces will be marked as `@internal`

## 2.1.0
All Proxy classes and interfaces will be marked as `@deprecated`

All public Resolvers and Interfaces will be moved to the `Contract` namespace.

Resolver in `Contract` will contain all `public static` methods if they are not marked as `internal`
