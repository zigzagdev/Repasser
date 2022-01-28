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
        // 半角英字チェック
        Validator::extend('c_alpha', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z]+$/', $value);
        });

        // 半角英字＋スペースチェック
        Validator::extend('c_alpha_sp', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z\s]+$/', $value);
        });

        // 半角英数字チェック
        Validator::extend('c_alpha_num', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z\d_\-]+$/', $value);
        });

        // 半角英数字チェック
        Validator::extend('c_alpha_num_sp', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z\d_\s]+$/', $value);
        });

        // 半角数字＋スペースチェック
        Validator::extend('c_num_sp', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9\s]+$/', $value);
        });

        // ファイルフォーマットチェック（画像 or PDF）
        Validator::extend('image_or_pdf', function ($attribute, $value, $parameters, $validator) {
            return (\File::extension($value) == '');
        });

        // 半角数字
        Validator::extend('c_num', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9]+$/', $value);
        });

        // 日付（YYYY-MM-DD）（YYYY/MM/DD）
        Validator::extend('v_date', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9]{4}[-\/](0[1-9]|[1-9]|1[0-2])[-\/](0[1-9]|[1-9]|[1-2][0-9]|3[0-1])$/', $value);
        });

        // 日付（YYYY-MM-DD）（YYYY/MM/DD）
        Validator::extend('c_date', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $value);
        });

        Validator::extend('c_every', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/\A(?:\p{Hiragana}|\p{Katakana}|[ー－]|[一-龠々])+\z/', $value);
        });

    }
}
