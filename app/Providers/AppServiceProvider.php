<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        view()->composer('front.elements.navbar', function($view){
            //get all parent categories with their subcategories
//            $categories = \App\ProdCategory::where('parent_id', null)->with('subcategories')->get();
            $categories = \App\ProdCategory::get()->toTree();

            //attach the categories to the view.
            $view->with(compact('categories'));
        });
    }
}
