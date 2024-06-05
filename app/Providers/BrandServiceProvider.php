<?php

namespace App\Providers;

use App\Models\Brand;
use Illuminate\Support\ServiceProvider;

class BrandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton('BrandService',function($app){
            return new class {
                public function getAllBrands(){
                    return Brand::orderBy('name', 'DESC')->get();
                }
            };
        });
    }
}