<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use App\Http\Middleware\CorsMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ViewServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         // Register the View Service Provider
         $this->app->register(ViewServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        JsonResource::withoutWrapping();
        $this->app['router']->aliasMiddleware('cors', CorsMiddleware::class);
    }
}
