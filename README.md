# Static Resolver Bundle

Static Resolver Bundle is designed to encapsulate the usage of static calls within a more robust and testable service-oriented architecture.

## Features in a Nutshell
- Provides a straightforward and seamless mechanism to transform static methods into injectable services. 
- Provides a proxy factory to reduce complexity, enhance testability, simplify code maintenance, and enforce better coding standards.
- Promotes a cleaner, more consistent and well-organized codebase.

:::caution

This bundle is public but will be treated like a pimcore-internal bundle.
It mostly wraps static calls to be able to inject static calls as services.
Interfaces in this bundle are not intended to be implemented by third-party developers.

:::


## Documentation Overview
- [Installation](doc/01_Installation.md)
- [Resolver Service Usage](doc/02_Resolver_Service_Usage.md)
- [Event Proxy Service Usage (deprecated)](doc/03_Event_Proxy_Service_Usage.md)
- [Interceptor Proxy Service Usage](doc/03_Interceptor_Proxy_Service_Usage.md)
- [Proxy Service Usage](doc/04_Proxy_Service_Usage.md)