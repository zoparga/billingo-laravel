<?php

namespace zoparga\BillingoLaravel;

use Illuminate\Support\ServiceProvider;

class BillingoLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('billingolaravel', function ($app) {
            return new Billingo();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/billingo-laravel.php' => config_path('billingo-laravel.php'),
            ], 'config');
        }
    }
}
