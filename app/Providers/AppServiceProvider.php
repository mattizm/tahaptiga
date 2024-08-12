<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      // Get the AliasLoader instance
      $loader = AliasLoader::getInstance();

      // Add your aliases
      $loader->alias('FastExcel', FastExcel::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Paginator::useBootstrap();
    }
}
