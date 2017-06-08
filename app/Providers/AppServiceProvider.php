<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		
        View::share('navbar', \App\Models\Navbar::all());
        View::share('listOfCarBrand', \App\Models\Car::listOfCarBrands());
        // View::share('categories', \App\Models\Category::all());
        View::share('categories', \App\Models\Category::listOfCategories());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
