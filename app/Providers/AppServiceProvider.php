<?php

namespace App\Providers;
//use DB;
//use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        view()->composer( 'blog.aside', function( $view ){
            $view->with( 'archives', \App\Post::archives() );
        });

        view()->composer( 'games.aside', function( $view ){
            $view->with( 'archives', \App\Game::archives() );
        });
/*
        DB::listen(function($query){
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });
*/
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
