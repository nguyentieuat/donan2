<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth, View;
use App\Category;
use App\Cart;
use Session;
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

        view()->composer(['frontend.header','frontend.page.checkout'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
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
