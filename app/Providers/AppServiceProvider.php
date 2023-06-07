<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as BaseValidator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(190);
        Validator::extend('password_validator', function ($attr, $value, $params = [], BaseValidator $validator) {
            $uppercase    = preg_match('@[A-Z]@', $value);
            $lowercase    = preg_match('@[a-z]@', $value);
            $number       = preg_match('@[0-9]@', $value);


            if (!$uppercase || !$lowercase || !$number  || strlen($value) < 8) {
                return false;
            } else {
                return true;
            }
        }, ':attribute به اندازه کافی قوی نیست');
    }
}
