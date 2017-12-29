<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$data = 'KPT';
        //View::share(compact('data')); //all view
        
        View::composer(['pages.form-input','welcome'],function($view){
            $data = 'KPT';
            return $view->with(['data'=>$data]);
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
