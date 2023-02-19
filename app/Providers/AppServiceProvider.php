<?php

namespace App\Providers;

use App\Services\ConverterInterface;
use App\Services\ExternalApiConverterService;
use App\Services\LocalConverterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //This is where the easy change between local and the api can be done
        //Change from LocalConverterService to ExternalApiConverterService
        $this->app->bind(ConverterInterface::class, function() {
            return new LocalConverterService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
