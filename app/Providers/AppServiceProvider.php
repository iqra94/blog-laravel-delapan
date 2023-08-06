<?php

namespace App\Providers;

use App\Models\Unpas\UnpasUser;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Gate::define('unpasIsAdmin', function(UnpasUser $unpasUser){
            // return $unpasUser->username === 'kira';
            return $unpasUser->is_admin;
        });// ini punya Unpas
        Paginator::useBootstrap();// ini punya Unpas
        Schema::defaultStringLength(191);// ini punya Sharma Code - Ecommerce - part1
    }
}
