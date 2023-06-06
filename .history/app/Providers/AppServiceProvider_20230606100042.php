<?php

namespace App\Providers;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View()->share('thuonghieu',DB::table('thuonghieu')->get());
        View()->share('category',DB::table('category_product')->get());
        Paginator::useBootstrap();
    }
}