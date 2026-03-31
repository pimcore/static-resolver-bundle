# Upgrade notes

## Upgrade to 2026.1.0

### PHP / Symfony Requirements

- Added support for PHP 8.5
- Dropped PHP 8.3 and Symfony 6 support — upgrade to PHP 8.4+ and Symfony 7 before updating to this version

### Removed Admin Classic UI (ExtJS) Support

The bundle no longer supports the Pimcore Admin Classic UI (ExtJS):

- `PimcoreStaticResolverBundle` no longer implements `PimcoreBundleAdminClassicInterface` and no longer uses `BundleAdminClassicTrait`

### Interface / Type Hint Changes

- `ProxyEvent::getTypeArray()` parameter type changed from `ReflectionIntersectionType|ReflectionNamedType|ReflectionUnionType|null` to `\ReflectionType|null`
- `ProxyPreInterceptor::getTypeArray()` parameter type changed from `ReflectionIntersectionType|ReflectionNamedType|ReflectionUnionType|null` to `\ReflectionType|null`
- In `ProxyEvent` and `ProxyPreInterceptor` the null-safe call `$returnType?->allowsNull()` has been replaced with `$returnType->allowsNull()` — callers must ensure `$returnType` is never `null` before invoking `allowsNull()`

## 4.0.0
- Added getter/setter of GetInheritedProperties in element contract interfaces 

## 2.0.0
All Resolver classes and interfaces will be marked as `@internal`

## 2.1.0
All Proxy classes and interfaces will be marked as `@deprecated`

All public Resolvers and Interfaces will be moved to the `Contract` namespace.

Resolver in `Contract` will contain all `public static` methods if they are not marked as `internal`
