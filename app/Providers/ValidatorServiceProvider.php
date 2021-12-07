<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

//基本的なValidationはここに記述する。

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });


        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });


        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });


        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });


        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });


        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });


        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });

        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });

        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });

        Validator::extend('',function ($attribute,$value,$parameters,$validator){
            return preg_match('',$value);
        });
    }
}
