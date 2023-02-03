<?php

namespace zoparga\BillingoLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BillingoLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('billingolaravel')
            ->hasConfigFile(['billingo-laravel'])
            ->hasMigration('create_package_tables');
    }

    // /**
    //  * Register services.
    //  *
    //  * @return void
    //  */
    // public function register()
    // {
    //     $this->app->bind('billingolaravel', function ($app) {
    //         return new Billingo();
    //     });
    // }

    // /**
    //  * Bootstrap services.
    //  *
    //  * @return void
    //  */
    // public function boot()
    // {
    //     if ($this->app->runningInConsole()) {
    //         $this->publishes([
    //             __DIR__.'/../config/billingo-laravel.php' => config_path('billingo-laravel.php'),
    //         ], 'config');
    //     }
    // }
}
