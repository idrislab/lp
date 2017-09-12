<?php

namespace LandingPages\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
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
        Validator::extendImplicit('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $secret = app('request')->input('site_key');
            return verifyRecaptcha($value, $secret);
        }, 'Please ensure that you are a human!');

        Blade::directive('recaptcha', function ($siteKey, $theme = 'light') {
            return '<div class="g-recaptcha" data-theme="'.$theme.'"
                            data-sitekey="'.$siteKey.'"></div>';
        });
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
