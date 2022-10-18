Laravel Mocean
===============
[![Latest Stable Version](https://img.shields.io/packagist/v/mocean/laravel-mocean.svg)](https://packagist.org/packages/mocean/laravel-mocean)
[![CI-coverage](https://github.com/MoceanAPI/laravel-mocean/actions/workflows/ci-coverage.yml/badge.svg)](https://github.com/MoceanAPI/laravel-mocean/actions/workflows/ci-coverage.yml)
[![License](https://img.shields.io/packagist/l/mocean/laravel-mocean.svg)](https://packagist.org/packages/mocean/laravel-mocean)
[![Total Downloads](https://img.shields.io/packagist/dt/mocean/laravel-mocean.svg)](https://packagist.org/packages/mocean/laravel-mocean)

## Installation

To install the library, run this command in terminal:
```bash
composer require mocean/laravel-mocean
```

### Laravel 5.5

You don't have to do anything else, this package autoloads the Service Provider and create the Alias, using the new Auto-Discovery feature.

### Laravel 5.4 and below

Add the Service Provider and Facade alias to your `config/app.php`

```php
'providers' => [
    Mocean\Laravel\MoceanServiceProvider::class,
]

'aliases' => [
    'Mocean' => Mocean\Laravel\Facade\Facade::class,
]
```

### Publish the config file

```bash
php artisan vendor:publish --provider="Mocean\Laravel\MoceanServiceProvider"
```

## Usage

Creating a Mocean object
```php
//use configured mocean setting from Laravel IOC Container
$mocean = app('mocean');
```

Send a text message
```php
$mocean->message()->send([
    'mocean-to' => '60123456789',
    'mocean-from' => 'MOCEAN',
    'mocean-text' => 'Hello World'
]);
```

If you have multiple account defined in config
```php
$mocean->using('second_account')->message()->send(...);
$mocean->using('third_account')->message()->send(...);
```

or use credential programmatically
```php
//by \Mocean\Client\Credentials\Basic class
$mocean->using(
    new \Mocean\Client\Credentials\Basic('mocean_api_key', 'mocean_api_secret')
)->message()->send(...);

//by using array
$mocean->using([
    'MOCEAN_API_KEY' => 'mocean_api_key',
    'MOCEAN_API_SECRET' => 'mocean_api_secret'
])->message()->send(...);
```

### Using Facade

Facade auto configured using the config file, make sure u publish the config file.

Include this facade
```php
use Mocean;

Mocean::message()->send(...);
Mocean::using(...)->message(...);
```

then u can statically call all function defined in the sdk.
Look [Usage](https://moceanapi.com/docs/?php#) for more usage info.

## License

Laravel Mocean is licensed under the [MIT License](LICENSE)
