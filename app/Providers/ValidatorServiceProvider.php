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
//        半角英数字のみ（空文字OK）
        Validator::extend('h_alphanum',function ($attribute,$value,$parameters,$validator){
            return preg_match('/^[0-9a-zA-Z]*$/',$value);
        });

//        全角ひらがな（空文字OK）
        Validator::extend('f_hira',function ($attribute,$value,$parameters,$validator){
            return preg_match('^[ぁ-んー]*$',$value);
        });

//        半角英数記号のみ（空文字OK）
        Validator::extend('h_alpanumnote',function ($attribute,$value,$parameters,$validator){
            return preg_match('^[a-zA-Z0-9!-/:-@¥[-`{-~]*$',$value);
        });

//        郵便番号
        Validator::extend('postal',function ($attribute,$value,$parameters,$validator){
            return preg_match('\s?[0-9]{3}-?[0-9]{4}',$value);
        });

//        キャリア端末ハイフンありなし
        Validator::extend('tel_mobile',function ($attribute,$value,$parameters,$validator){
            return preg_match('^0[789]0(-\d{4}-\d{4}|\d{8})$',$value);
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