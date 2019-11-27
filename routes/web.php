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


Auth::routes();

Route::group(['namespace'=>'Auth'],function(){
    Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap','LoginController@postLogin')->name('post.login');
    Route::get('logout','LoginController@logout')->name('get.logout');
    Route::get('register','RegisterController@getRegister')->name('get.register');
    Route::post('register','RegisterController@postRegister')->name('post.register');
    
});

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=>'product'],function(){
    Route::get('/','ProductController@index')->name('product');
    Route::get('/action','ProductController@action')->name('product.action');
    Route::get('/{product}','ProductController@detail')->name('product.detail');
});
Route::group(['prefix'=>'shopping'],function(){
    Route::get('/','ShoppingCartController@index')->name('cart.index');
    Route::get('/add/{id}','ShoppingCartController@addItem')->name('cart.add.item');
    Route::post('/update','ShoppingCartController@updateCart')->name('cart.update');
    Route::get('/remove/{id}','ShoppingCartController@removeItem')->name('cart.remove.item');
    Route::get('/checkout','ShoppingCartController@checkout')->name('cart.checkout');
 });

Route::group(['prefix'=>'contact'],function(){
     Route::get('/','ContactController@index')->name('contact.index');
     Route::post('/','ContactController@addItem');
 });

Route::group(['prefix'=>'about'],function(){
    Route::get('/','AboutController@index')->name('about.index');
});

Route::group(['prefix'=>'blog'],function(){
    Route::get('/','BlogController@index')->name('blog.index');
});



