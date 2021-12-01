<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Account;
use App\File;
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
        $file_table =  Schema::hasTable('files');
        if($user_table != null){
            view()->share('verification_requests', Account::where('verify_status','1')->count());
        }
        if($file_table != null){
            view()->share('fwd_file', File::count());
            //view()->share('cancelled_files', File::count()->where('cancelled', '1'));
        }

    }
}
