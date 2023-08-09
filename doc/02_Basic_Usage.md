# Basic Usage

## Static Resolver

The basic idea is to replace static function calls with resolver services to make the design more robust and better testable.

### Old usage with static call

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

### Resolver service injection

```php

use Pimcore\Bundle\StaticResolverBundle\Lib\Tools\Authentication\AuthenticationResolverInterface;

final class SecurityService implements SecurityServiceInterface
{
     public function __construct(private readonly AuthenticationResolverInterface $authenticationResolver
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

