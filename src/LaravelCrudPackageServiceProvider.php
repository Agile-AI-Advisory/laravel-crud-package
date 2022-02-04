<?php

namespace PurrDigital\LaravelCrudPackage;

use PurrDigital\LaravelCrudPackage\Commands\GenerateCrudCommand;
use PurrDigital\LaravelCrudPackage\Commands\MakeCrudControllerCommand;
use PurrDigital\LaravelCrudPackage\Commands\MakeInterfaceCommand;
use PurrDigital\LaravelCrudPackage\Commands\MakeRepositoryCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelCrudPackageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-crud-package')
            ->hasCommand(GenerateCrudCommand::class)
            ->hasCommand(MakeInterfaceCommand::class)
            ->hasCommand(MakeRepositoryCommand::class)
            ->hasCommand(MakeCrudControllerCommand::class);
    }
}
