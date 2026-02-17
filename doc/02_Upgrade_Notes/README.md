# Upgrade notes

## 3.5.0
- Added commented methods in interfaces for upcoming introduction of getter/setter of `GetInheritedProperties` in AssetResolverContractInterface, ConcreteObjectResolverContractInterface, DataObjectFolderResolverContractInterface, DocumentResolverContractInterface.

## 2.0.0
All Resolver classes and interfaces will be marked as `@internal`

## 2.1.0
All Proxy classes and interfaces will be marked as `@deprecated`

All public Resolvers and Interfaces will be moved to the `Contract` namespace.

Reslover in `Contract` will contain all `public static` methodes if they are not marked as `internal`
