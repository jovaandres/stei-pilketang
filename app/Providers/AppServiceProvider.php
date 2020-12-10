<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        Validator::extend('iexists', function ($attribute, $value, $parameters, $validator) {
            $query = \DB::table($parameters[0]);
            $column = $query->getGrammar()->wrap($parameters[1]);
            return $query->where(\DB::raw('BINARY `token_vote`'), $value)->first();
        }, "Input :attribute tidak ada di database.");
    }
}
