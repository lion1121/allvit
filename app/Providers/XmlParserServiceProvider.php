<?php

namespace App\Providers;

use App\Helpers\Parsers\XmlParser;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class XmlParserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
       $this->app->bind('App\Helpers\Parsers\Parser', function (){
           return new XmlParser();
       });
    }
}
