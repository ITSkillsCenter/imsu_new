<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Current_Semester_Running;
use Illuminate\Support\Facades\View;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
        View::composer('*', function($view)
        {
            $current = Current_Semester_Running::where('status','active')->first();
            $view->with('active_semester', $current->title);
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
