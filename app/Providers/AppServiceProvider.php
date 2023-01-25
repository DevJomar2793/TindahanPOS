<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Validator::extend('form_complete', function ($attribute, $value, $parameters, $validator) 
        // {
        //     $data = $validator->getData();
        //     foreach ($parameters as $field) {
        //         if (!isset($data[$field]) || empty($data[$field])) {
        //             return false;
        //         }
        //     }
        //     return true;
        // });

        //sir pakiexplain sa akin itong side na ito. kinuha ko lang kasi ito sa ChatGPT eh.
        
    }
}
