<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'category'],function(){
		Route::get('list','CategoryController@getList');
		Route::get('edit/{id}','CategoryController@getEdit');
		Route::post('edit/{id}','CategoryController@postEdit');
		Route::get('add','CategoryController@getAdd');
		Route::post('add','CategoryController@postAdd');
		Route::get('del/{id}','CategoryController@getDel');

		

	});

	Route::group(['prefix'=>'brand'],function(){
		Route::get('list','BrandController@getList');
		Route::get('edit/{id}','BrandController@getEdit');
		Route::post('edit/{id}','BrandController@postEdit');
		Route::get('add','BrandController@getAdd');
		Route::post('add','BrandController@postAdd');
		Route::get('del/{id}','BrandController@getDel');

		

	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('list','SlideController@getList');
		Route::get('edit/{id}','SlideController@getEdit');
		Route::post('edit/{id}','SlideController@postEdit');
		Route::get('add','SlideController@getAdd');
		Route::post('add','SlideController@postAdd');
		Route::get('del/{id}','SlideController@getDel');
		Route::post('swapSlide', 'SlideController@swapSlide');
		

	});


	Route::group(['prefix'=>'product'],function(){
		Route::get('list','ProductController@getList');
		Route::get('edit/{id}','ProductController@getEdit');
		Route::post('edit/{id}','ProductController@postEdit');
		Route::get('add','ProductController@getAdd');
		Route::post('add','ProductController@postAdd');
		Route::get('del/{id}','ProductController@getDel');
	});

	Route::group(['prefix'=>'comment'],function(){
		Route::get('list','CommentController@getList');
		Route::post('update/{id}','CommentController@UpdateComment')->name('update_comment');
		Route::get('del/{id}/{pid}','CommentController@getDel');

	});
  
	Route::group(['prefix'=>'news'],function(){
		Route::get('list','NewsController@getList');
		Route::get('edit/{id}','NewsController@getEdit');
		Route::post('edit/{id}','NewsController@postEdit');
		Route::get('add','NewsController@getAdd');
		Route::post('add','NewsController@postAdd');
		Route::get('del/{id}','NewsController@getDel');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','UserController@getList');
		Route::get('edit/{id}','UserController@getEdit');
		Route::post('edit/{id}','UserController@postEdit');
		Route::get('add','UserController@getAdd');
		Route::post('add','UserController@postAdd');
		Route::get('del/{id}','UserController@getDel');
	});

	Route::group(['prefix'=>'bill'],function(){
		Route::get('list','BillController@getList');
		Route::get('detail/{id}','BillController@getDetail')->name('detail');
		// Route::get('edit/{id}','UserController@getEdit');
		Route::post('edit/{id}','BillController@UpdateOrder')->name('update_order');
		// Route::get('add','UserController@getAdd');
		// Route::post('add','UserController@postAdd');
		// Route::get('del/{id}','UserController@getDel');
	});
	Route::group(['prefix'=>'customer'],function(){
		Route::get('list','CustomerController@getList');
		// Route::get('edit/{id}','UserController@getEdit');
		// Route::post('edit/{id}','UserController@postEdit');
		// Route::get('add','UserController@getAdd');
		// Route::post('add','UserController@postAdd');
		// Route::get('del/{id}','UserController@getDel');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('category/{parentId}','AjaxController@getCategory');
		
	});

});
Route::get('index',[
	'as'=>'index',
	'uses'=>'PageController@getIndex'
]);
Route::get('product-type/{type}',[
	'as'=>'producttype',
	'uses'=>'PageController@getProductType'
]);
Route::get('product-detail/{id}',[
	'as'=>'productdetail',
	'uses'=>'PageController@getProductDetail'
]);
Route::get('shopping-cart',[
	'as'=>'shoppingcart',
	'uses'=>'PageController@getShoppingCart'
]);
Route::get('contact',[
	'as'=>'contact',
	'uses'=>'PageController@getContact'
]);
Route::get('add-to-cart/{id}',[
	'as'=>'addtocart',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'delcart',
	'uses'=>'PageController@getDelCart'
]);
Route::get('checkout',[
	'as'=>'checkout',
	'uses'=>'PageController@getCheckout'
]);
Route::post('checkout',[
	'as'=>'checkout',
	'uses'=>'PageController@postCheckout'
]);
Route::get('signup',[
	'as'=>'signup',
	'uses'=>'PageController@getSignup'
]);
Route::post('signup',[
	'as'=>'signup',
	'uses'=>'PageController@postSignup'
]);
Route::get('update/{id}',[
	'as'=>'update',
	'uses'=>'PageController@getUpdate'
]);
Route::post('update/{id}',[
	'as'=>'update',
	'uses'=>'PageController@postUpdate'
]);
Route::get('login',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);
Route::get('seach',[
	'as'=>'seach',
	'uses'=>'PageController@getSeach'
]);
