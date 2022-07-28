# Opinionated Repository CRUD Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/PurrDigital/laravel-crud-package.svg?style=flat-square)](https://packagist.org/packages/PurrDigital/laravel-crud-package)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/PurrDigital/laravel-crud-package/run-tests?label=tests)](https://github.com/PurrDigital/laravel-crud-package/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/PurrDigital/laravel-crud-package/Check%20&%20fix%20styling?label=code%20style)](https://github.com/PurrDigital/laravel-crud-package/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/PurrDigital/laravel-crud-package.svg?style=flat-square)](https://packagist.org/packages/PurrDigital/laravel-crud-package)

This package will create a full crud suite for you. This is based on an opinionated repository pattern. This package uses vue/inertia for the front end so this package won't work with any other front-end unless of course you manually update the controllers to work with your front end.

## Installation

You can install the package via composer:

```bash
composer require PurrDigital/laravel-crud-package
```

## Usage

```php
In the terminal and using php artisan you can run the following command
php artisan generate:crud Test
```

Using the above command will generate the following,

1. Controller
2. Model
3. Seeder
4. Policy
5. Request
6. Resource
7. Interface
8. Repository
9. Update repository provider(if it exists)


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
