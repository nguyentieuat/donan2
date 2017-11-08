<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth, View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
        $view->with('currentUser', Auth::user());
    });
        View::composer('frontend.header', function($viewP){
            $categoryP = Category::where('parentId',null)->get();
            $categoryC = Category::where('parentId','<>',null)->get();
            $viewP->with(compact('categoryP','categoryC'));
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
