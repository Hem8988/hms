<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        //room categroy
        View::share('key', 'value');
        Schema::defaultStringLength(191);

       $categories=DB::table('room__categories')->get();
       View::share('categories',$categories);

//roomsname
    //    View::share('key', 'value');
    //    Schema::defaultStringLength(191);

    //   $roomList=DB::table('rooms')->get();
    //   View::share('rooms',$roomList); 
     
    }
}
