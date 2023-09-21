
# Event Proxy Service Usage

## Overview

`EventProxyService` is a service class that provides functionality to wrap an object's instance with `pre` and `post` method interceptors. These interceptors are respectively triggered right before or after the invocation of the specified methods.

When an interceptor is triggered, an event is dispatched using the `EventDispatcher`. The event name is composed of the lower case fully-qualified class name of the original object (with backslashes replaced by dots), the lower case method name, and the prefix (`.pre` or `.post`).

For example, for a pre-interceptor on the `save` method of a class named `App\Entity\User`, the event name will be `app.entity.user.save.pre`.

## `getEventDispatcherProxy()` Method


This method creates a proxy of the given instance and binds `pre` and `post` method interceptors to it.

```php
public function getEventDispatcherProxy(
    object $instance,
    array $preInterceptors = [],
    array $postInterceptors = []
): object;
```

**Parameters:**

- `$instance`: The object instance that needs to be proxied.
- `$preInterceptors` (optional): An array of method names that should be intercepted before their invocation.
- `$postInterceptors` (optional): An array of method names that should be intercepted after their invocation.
- `$customEventName` (optional): A custom event name that will be used in addition to the default one. (`.pre` and `.post` will be added)

**Returns:**

- A proxy of the given `$instance`.

:::info 

Final classes can't be proxied.

:::

---

## Example Usage With Symfony's Dependency Injection

### Configuration (`services.yaml`)

```yaml
services:
    # ... [other service definitions]
    
    App\EventListener\InterceptorListener:
        tags:
            - { name: kernel.event_listener, event: 'app.entity.user.save.pre', method: 'onUserSavePre' }
            - { name: kernel.event_listener, event: 'app.entity.user.save.post', method: 'onUserSavePost' }
```

### Listener Example

To respond to the dispatched events when interceptors are triggered, you can set up listeners. Here's an example of a listener for the `pre` interceptor of the `save` method on the `App\Entity\User` class:

```php
namespace App\EventListener;

use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPostInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Events\ProxyPreInterceptor;
use Pimcore\Bundle\StaticResolverBundle\Proxy\Exceptions\ReadOnlyException;
use Pimcore\Model\User;

class InterceptorListener
{
    public function onUserSavePre(ProxyPreInterceptor $event)
    {
        /** @var User $userInstance */
        $userInstance = $event->getSubject();
        
        /** 
         * get the called method 
         * e.g. 'save' 
         */
        $calledMethod = $event->getMethodName();
        
        /**
         * in a post interceptor you can get the return value of the original method.
         * E.g use it for caching. 
         */
        $returnValue = $event->getReturnValue();
        
        /** 
         * get the used argumetns as associative array 
         * E.g. ['id' => 12]
         */
        $paramters = $event->getMethodArguments()
        
        /**
         * get the used argument by name 
         */
        $id = $event->getMethodArgument('id');
        
        /**
         * set the respone that will be returned by the proxy.
         * return false if response is locked. 
         * the original method will not be called. E.g retun cache value.         * 
         */
        $event->setResponse($userInstance);
        
        /**
         * disable future setting of the response. 
         */
        $event->lockResponse();
        
        /**
         * bool if the response is locked. 
         */
        $this->isResponseLocked();
        
        // Your custom logic here. For instance:
        // Logging, caching or modifying data before save, etc.
    }
    
    public function onUserSavePost(ProxyPostInterceptor $event)
    {        
        /** 
         * get the called method 
         * e.g. 'save' 
         */
        $calledMethod = $event->getMethodName();
        
        /** 
         * get the called class 
         * e.g. 'App\Entity\User' 
         */
        $istanceClass = $event->getSubjectClass();
        
        /**
         * get the return value of the original method. 
         * E.g use it for caching. 
         */
        $returnValue = $event->getReturnValue();
        
        /** 
         * get the used arguments as associative array 
         * E.g. ['id' => 12] use it for caching, etc.
         */
        $paramters = $event->getMethodArguments()
        
        /**
         * get the used argument by name 
         */
        $id = $event->getMethodArgument('id');
                
        // Your custom logic here. For instance:
        // Logging, caching data after save, etc.
    }
}
```

### Using `EventProxyService` in a Controller

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

:::info

When the pre-interceptor for the `save` method is triggered, the `onUserSavePre` method in the `InterceptorListener` class will be executed, and you can handle the event as needed.

:::
