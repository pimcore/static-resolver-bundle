# Resolver Service Usage


The Static Resolver Bundle allows to replace static function calls with resolver services to make the design more robust and testable:

## Old Usage With a Static Call

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

## Replacement With Resolver Service Injection

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

