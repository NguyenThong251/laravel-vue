<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app->singleton('CategoryService',function($app){
            return new class {
                public function getAllCategories(){
                    return Category::orderBy('name', 'DESC')->get();
                }
            };
        });
    }
}