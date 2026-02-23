# Upgrade notes

## 4.0.0
- Added getter/setter of GetInheritedProperties in element contract interfaces 

## 2.0.0
All Resolver classes and interfaces will be marked as `@internal`

## 2.1.0
All Proxy classes and interfaces will be marked as `@deprecated`

All public Resolvers and Interfaces will be moved to the `Contract` namespace.

Resolver in `Contract` will contain all `public static` methods if they are not marked as `internal`
