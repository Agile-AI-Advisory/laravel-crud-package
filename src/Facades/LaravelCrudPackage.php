<?php

namespace PurrDigital\LaravelCrudPackage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PurrDigital\LaravelCrudPackage\LaravelCrudPackage
 */
class LaravelCrudPackage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-crud-package';
    }
}
