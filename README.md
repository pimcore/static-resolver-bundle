# Static Resolver Bundle

## What is the Static Resolver Bundle?

The Static Resolver Bundle is a Pimcore bundle designed to encapsulate static method calls within a service-oriented architecture. It provides a straightforward mechanism to transform static methods into injectable services, promoting a cleaner, more testable, and well-organized codebase.

In many PHP applications, including Pimcore, static methods are commonly used for utility functions and global operations. While convenient, static methods have several drawbacks:

1. **Testing Difficulties**: Static methods are hard to mock in unit tests
2. **Tight Coupling**: Code using static calls is tightly coupled to the implementation
3. **Hidden Dependencies**: Static dependencies aren't explicit in class constructors

The Static Resolver Bundle addresses these issues by wrapping static calls in service classes that can be properly injected and mocked.

## Architecture

The bundle follows a consistent pattern for each static class it wraps:

1. **Contract Interfaces**: Define the methods that will be available (e.g., `DbResolverContractInterface`)
2. **Contract Implementations**: Implement the interfaces by wrapping static calls (e.g., `DbResolverContract`)
3. **Bundle-specific Interfaces**: Extend the contract interfaces and are marked as internal (e.g., `DbResolverInterface`)
4. **Bundle-specific Implementations**: Extend the contract implementations and implement the bundle-specific interfaces (e.g., `DbResolver`)

This layered approach allows for flexibility and maintainability while keeping the public API clean.

## How to Use the Static Resolver Bundle

### Installation

1. Install via Composer:
   ```bash
   composer require pimcore/static-resolver-bundle
   ```

2. Enable the bundle in `config/bundles.php`:
   ```php
   use Pimcore\Bundle\StaticResolverBundle\PimcoreStaticResolverBundle;
   // ...

   return [
       // ...
       PimcoreStaticResolverBundle::class => ['all' => true],
       // ...
   ];
   ```

### Using Resolver Services

Instead of using static calls directly in your code, inject the appropriate resolver service and use its methods:

#### Before (with static calls):

```php
use Pimcore\Tool\Authentication;

final class SecurityService implements SecurityServiceInterface
{
    public function getPimcoreUser(): User
    {
        $pimcoreUser = Authentication::authenticateSession();
        if (!$pimcoreUser instanceof User) {
            throw new Exception('No pimcore user found');
        }

        return $pimcoreUser;
    }
}
```

#### After (with resolver service):

```php
use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Tools\Authentication\AuthenticationResolverContractInterface;

final class SecurityService implements SecurityServiceInterface
{
     public function __construct(private readonly AuthenticationResolverContractInterface $authenticationResolver
    ) {
    }

    public function getPimcoreUser(): User
    {
        $pimcoreUser = $this->authenticationResolver->authenticateSession();
        if (!$pimcoreUser instanceof User) {
            throw new Exception('No pimcore user found');
        }

        return $pimcoreUser;
    }
}
```

### Available Resolver Services

The bundle provides resolver services for various Pimcore components:

1. **Database Operations**:
    - `Pimcore\Bundle\StaticResolverBundle\Contract\Db\DbResolverContractInterface`

2. **Model Operations**:
    - Various resolvers for DataObject, Asset, Document, etc.

3. **Library Tools**:
    - Authentication, Console, Email, etc.

### Benefits of Using Resolver Services

1. **Improved Testability**: Services can be easily mocked in unit tests
2. **Explicit Dependencies**: Dependencies are clearly visible in constructor parameters
3. **Loose Coupling**: Code depends on interfaces rather than concrete implementations
4. **Consistent API**: The resolver services provide a consistent API for static functionality

## Example Use Cases

### Database Operations

Instead of using `Pimcore\Db` static methods:

```php
use Pimcore\Db;

$connection = Db::getConnection();
$data = $connection->fetchAllAssociative('SELECT * FROM users');
```

Use the DbResolver service:

```php
use Pimcore\Bundle\StaticResolverBundle\Contract\Db\DbResolverContractInterface;

class UserRepository
{
    public function __construct(private readonly DbResolverContractInterface $dbResolver)
    {
    }

    public function getAllUsers(): array
    {
        $connection = $this->dbResolver->getConnection();
        return $connection->fetchAllAssociative('SELECT * FROM users');
    }
}
```

### Authentication

Instead of using `Pimcore\Tool\Authentication` static methods:

```php
use Pimcore\Tool\Authentication;

$user = Authentication::authenticateSession();
```

Use the AuthenticationResolver service:

```php
use Pimcore\Bundle\StaticResolverBundle\Contract\Lib\Tools\Authentication\AuthenticationResolverContractInterface;

class AuthService
{
    public function __construct(private readonly AuthenticationResolverContractInterface $authenticationResolver)
    {
    }

    public function getCurrentUser()
    {
        return $this->authenticationResolver->authenticateSession();
    }
}
```

## Internal Use Examples

For internal Pimcore use, you can use the Bundle-specific Interfaces (marked as `@internal`). These interfaces extend the Contract Interfaces and may provide additional functionality specific to Pimcore's internal needs.

### Database Operations (Internal Use)

```php
use Pimcore\Bundle\StaticResolverBundle\Db\DbResolverInterface;

/**
 * @internal This class is for internal Pimcore use only
 */
class InternalPimcoreService
{
    public function __construct(private readonly DbResolverInterface $dbResolver)
    {
    }

    public function executeInternalQuery(): array
    {
        $connection = $this->dbResolver->getConnection();
        return $connection->fetchAllAssociative('SELECT * FROM internal_table');
    }
}
```

### Authentication (Internal Use)

```php
use Pimcore\Bundle\StaticResolverBundle\Lib\Tools\Authentication\AuthenticationResolverInterface;

/**
 * @internal This class is for internal Pimcore use only
 */
class InternalAuthService
{
    public function __construct(private readonly AuthenticationResolverInterface $authenticationResolver)
    {
    }

    public function validateInternalUser()
    {
        return $this->authenticationResolver->authenticateSession();
    }
}
```

## Important Notes

- All Contract Interfaces in this bundle are designed for third-party developers to use
- Bundle-specific Interfaces (marked as `@internal`) are intended for internal Pimcore use only
- The bundle provides a transition path from static methods to a more service-oriented architecture


## Documentation Overview
- [Installation](doc/01_Installation.md)
- [Resolver Service Usage](doc/02_Resolver_Service_Usage.md)
- [Event Proxy Service Usage (deprecated)](doc/03_Event_Proxy_Service_Usage.md)
- [Interceptor Proxy Service Usage (deprecated)](doc/03_Interceptor_Proxy_Service_Usage.md)
- [Proxy Service Usage (deprecated)](doc/04_Proxy_Service_Usage.md)
- [Upgrade Notes](doc/02_Upgrade_Notes/README.md)