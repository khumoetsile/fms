<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Account;
use Illuminate\Support\Facades\Schema;

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
        $user_table =  Schema::hasTable('users');
        if($user_table != null){
            view()->share('verification_requests', Account::where('verify_status','1')->count());
        }
    }
}
