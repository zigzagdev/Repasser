<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('h_alpha_num', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9a-zA-Z]*$/', $value);
        });

//        全角ひらがな（空文字OK）
        Validator::extend('f_hira', function ($attribute, $value, $parameters, $validator) {
            return preg_match('^[ぁ-んー]*$', $value);
        });

//        半角英数記号のみ（空文字OK）
        Validator::extend('h_alpha_num_note', function ($attribute, $value, $parameters, $validator) {
            return preg_match('^[a-zA-Z0-9!-/:-@¥[-`{-~]*$', $value);
        });

//        郵便番号
        Validator::extend('postal', function ($attribute, $value, $parameters, $validator) {
            return preg_match('\s?[0-9]{3}-?[0-9]{4}', $value);
        });

//        キャリア端末ハイフンありなし
        Validator::extend('tel_mobile', function ($attribute, $value, $parameters, $validator) {
            return preg_match('^0[789]0(-\d{4}-\d{4}|\d{8})$', $value);
        });

//        メールアドレス(緩め)
        Validator::extend('email', function ($attribute, $value, $parameters, $validator) {
            return preg_match('[^\s]+@[^\s]+', $value);
        });

//        数字(価格等で利用する際)
        Validator::extend('price', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[1-9][0-9]*$/', $value);
        });
//　　　　　　
        Validator::extend('c_num', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9]+$/', $value);
        });

//
//
//        Validator::extend('',function ($attribute,$value,$parameters,$validator){
//            return preg_match('',$value);
//        });
//
//
//        Validator::extend('',function ($attribute,$value,$parameters,$validator){
//            return preg_match('',$value);
//        });
//
//
//        Validator::extend('',function ($attribute,$value,$parameters,$validator){
//            return preg_match('',$value);
//        });
    }
}
