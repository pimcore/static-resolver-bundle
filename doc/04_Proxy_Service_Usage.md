# Documentation for `ProxyService` Class

## Overview:

The `ProxyService` class offers the capability to generate proxy objects for specified classes and methods. It provides methods to create proxies in various configurations including a strict or decorator mode which restricts the proxy object to only expose methods specified by an interface.

## Methods:

### `getProxyObject`

    - Retrieve a proxy object for a given class and method.
    - The proxy will contain all methods of the original class.

- **Parameters:**
    - `$className` (string): The fully qualified class name.
    - `$method` (string): The method name to call.
    - `$args` (array, optional): Arguments to pass to the method. Default is an empty array.

- **Returns:** object|null

### `getStrictProxyObject`

    - Retrieve a proxy object that strictly implements a specified interface.\
    - The proxy will only contain the methods of the specified interface, allowing you to limit access to methods.\ 
    - All methods from the given interface must be callabe in the original class.

- **Parameters:**
    - `$className` (string): The fully qualified class name.
    - `$method` (string): The method name to call.
    - `$interface` (string): The interface that the returned proxy object must implement.
    - `$args` (array, optional): Arguments to pass to the method. Default is an empty array.

- **Returns:** object|null

### `getDecoratorProxy`

    - Generate a proxy object that can optionally implement a specified interface.
    - If an interface is provided, the proxy will only contain the methods of that interface.
    - The interface can also include methods not present in the original class.
        * These methods must be addressed by the original class's magic PHP functions, like `__call`.

- **Parameters:**
    - `$className` (string): The fully qualified class name.
    - `$method` (string): The method name to call.
    - `$interface` (string, optional): The interface that the returned proxy object can implement.
    - `$args` (array, optional): Arguments to pass to the method. Default is an empty array.

- **Returns:** object|null

## **Example Extending UserInterface and decorater proxy**
Suppose you wish to extend the functionality of the User class with a new method, say getAdditionalData.

```php
interface MyExtendedInterface {
public function getFirstName();
public function getAdditionalData();
}
```

```php
$proxyService = new ProxyService(new RemoteObjectFactory());
$decoratorProxy = $proxyService->getDecoratorProxy(User::class, 'getById', MyExtendedInterface::class, ['12']);
```
When using the getDecoratorProxy with the MyExtendedInterface, the User class should look something like:

```php
class User {

    private string $firstName;
    
    
    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public static function getById($id): User {
        // Code to get user by id
    }

    public function getFirstName(): string
        return $this->firstName;
    }

    public function __call($name, $arguments) {
        // Handle methods that aren't explicitly defined in User but are in MyExtendedInterface
        if ($name == "getAdditionalData") {
            // logic for getAdditionalData
        }
    }
}
```

## **Example using an Incompatible Interface with strict proxy**

Let's say you mistakenly use an interface that expects a method that isn't in the User class.

```php
interface IncompatibleInterface {
public function getNonExistentMethod();
}
```
### User Class

```php
class User{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    public static function getById($id): User {
        // Code to get user by id
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }
}
```
If you attempt to use IncompatibleInterface with the ProxyService, it will result in an error because User class doesn't have getNonExistentMethod.

```php
try {
$proxyService = new ProxyService(new RemoteObjectFactory());
try {
    $strictProxyObject = $proxyService->getStrictProxyObject(User::class, 'getbyId', IncompatibleInterface::class, ['12']);
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();  // This will output an error message indicating the incompatibility.
}
```
In this error case, the getStrictProxyObject will throw an InvalidServiceException because of the attempt to proxy a method (getNonExistentMethod) that does not exist in the original User class.

## **Example Limiting UserInterface**
The following interface ensures that only the `getFirstName` method can be accessed:

```php
interface LimitedUserInterface {
    public function getFirstName();
}
```

### User Class

```php
class User{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    public static function getById($id): User {
        // Code to get user by id
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }
}
```

### Example Usage of User Class
```php
$user = new User::getById(12);
echo $user->getFirstName();  // Outputs: John
echo $user->getLastName();  // Outputs: Doe
```

### Using ProxyService with LimitedUserInterface
Using the ProxyService with `LimitedUserInterface` to get a decorator proxy object:

```php
$proxyService = new ProxyService(new RemoteObjectFactory());
$decoratorProxyObject = $proxyService->getDecoratorProxy(User::class, 'getById', LimitedUserInterface::class, ['12']);
echo $decoratorProxyObject->getFirstName();  // Outputs: John
// The following line would result in an error, even if it exist in the original User class:
// $decoratorProxyObject->getLastName();
```

**Note:** Other methods from the original User class are restricted in the proxy object due to `LimitedUserInterface`.
