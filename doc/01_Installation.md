# Installation

:::info

This bundle is only supported on Pimcore 11.

:::

To install Static Resolver Bundle, follow the two steps below:

1. Install the required dependencies:
```bash
composer require pimcore/static-resolver-bundle
```

2. Make sure the bundle is enabled in the `config/bundles.php` file. The following lines should be added:

```php
use Pimcore\Bundle\StaticResolverBundle\PimcoreStaticResolverBundle;
// ...

return [
    // ...
    PimcoreStaticResolverBundle::class => ['all' => true],
    // ...
];
```
