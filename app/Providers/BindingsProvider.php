<?php

namespace App\Providers;

use App\Services\GuzzleHttpClient;
use App\Services\HttpClient;
use Illuminate\Support\ServiceProvider;

class BindingsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(HttpClient::class, GuzzleHttpClient::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
