
# Documentation for `EventProxyService` Class

## **Overview**

`EventProxyService` is a service class that provides functionality to wrap an instance of an object with pre and post method interceptors. These interceptors are triggered right before or after the invocation of the specified methods, respectively.

When an interceptor is triggered, an event is dispatched using the `EventDispatcher`. The event name is composed of the lower case fully-qualified class name of the original object (with backslashes replaced by dots), the lower case method name, and the prefix (`.pre` or `.post`).

For example, if you have an interceptor on the `save` method of a class named `App\Entity\User` and it's a pre-interceptor, the event name will be `app.entity.user.save.pre`.

## **Method**

### `getEventDispatcherProxy()`

This method creates a proxy of the given instance, and binds pre and post method interceptors to it.

```php
public function getEventDispatcherProxy(
    object $instance,
    array $preInterceptors = [],
    array $postInterceptors = []
): object;
```

#### Parameters:

- `$instance`: The object instance that needs to be proxied.
- `$preInterceptors` (optional): An array of method names that should be intercepted before their invocation.
- `$postInterceptors` (optional): An array of method names that should be intercepted after their invocation.

#### Returns:

- A proxy of the given `$instance`.

> **Note**: Final Classes can't be proxied.

---

## **Example Usage with Symfony's Dependency Injection**

### **Configuration (`services.yaml`):**

```yaml
services:
    # ... [other service definitions]
    
    App\EventListener\InterceptorListener:
        tags:
            - { name: kernel.event_listener, event: 'app.entity.user.save.pre', method: 'onUserSavePre' }
            - { name: kernel.event_listener, event: 'app.entity.user.save.post', method: 'onUserSavePost' }
```

### **Listener Example:**

To respond to the dispatched events when interceptors are triggered, you can set up listeners. Here's an example of a listener for the `pre` interceptor of the `save` method on the `App\Entity\User` class:

```php
namespace App\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

class InterceptorListener
{
    public function onUserSavePre(GenericEvent $event)
    {
        /** @var User $userInstance */
        $userInstance = $event->getSubject();
        
        // Your custom logic here. For instance:
        // Logging, modifying data before save, etc.
    }
    
    public function onUserSavePost(GenericEvent $event)
    {
        /** @var User $userInstance */
        $userInstance = $event->getSubject();
        
        // Your custom logic here. For instance:
        // Logging, modifying data after save, etc.
    }
}
```

### **Using `EventProxyService` in a Controller:**

```php
use Pimcore\Bundle\StaticResolverBundle\Proxy\Service\EventProxyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;

class YourController extends AbstractController
{
    public function someAction(EventProxyService $eventProxyService)
    {
        $originalObject = new User::getById('12');

        $proxyObject = $eventProxyService->getEventDispatcherProxy(
            $originalObject,
            ['save'], // Assuming 'save' is the method we want to pre-intercept
            ['save'] // Assuming 'save' is the method we want to post-intercept
        );
        
        $proxyObject->setLastname('Doe');
        $proxyObject->save();  // This will trigger the interceptor(s) for the save method
        
        // Your remaining code
    }
}
```

> **Note**: When the pre-interceptor for the `save` method is triggered, the `onUserSavePre` method in the `InterceptorListener` class will be executed, and you can handle the event as needed.
