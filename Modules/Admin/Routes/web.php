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



Route::prefix('admin')->group(function() {
    Route::get('/login','AdminAuthController@getLogin')->name('admin.get.login');
    Route::post('/login','AdminAuthController@postLogin');
    Route::get('/logout','AdminAuthController@logout')->name('admin.post.logout');
    Route::group(['middleware'=>'check_login_admin'],function(){
        Route::get('/', 'AdminController@index')->name('admin.home');
        Route::group(['prefix'=>'category'],function(){
            Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
            Route::get('add','AdminCategoryController@create')->name('admin.add.category');
            Route::post('add','AdminCategoryController@store');
            Route::get('update/{id}','AdminCategoryController@edit')->name('admin.edit.category');
            Route::post('update/{id}','AdminCategoryController@update');
            Route::get('/{action}/{id}','AdminCategoryController@action')->name('admin.action.category');
        });
    
        Route::group(['prefix'=>'product'],function(){
            Route::get('/','AdminProductController@index')->name('admin.get.list.product');
            Route::get('add','AdminProductController@create')->name('admin.add.product');
            Route::post('add','AdminProductController@store');
            Route::get('update/{id}','AdminProductController@edit')->name('admin.edit.product');
            Route::post('update/{id}','AdminProductController@update');
            Route::get('/{action}/{id}','AdminProductController@action')->name('admin.action.product');
        });
    
        Route::group(['prefix'=>'order'],function(){
            Route::get('/','AdminOrderController@index')->name('admin.get.list.order');
            Route::get('detail/{id}','AdminOrderController@detail')->name('admin.order.detail');
            Route::get('/{action}/{id}','AdminOrderController@action')->name('admin.action.order');
            
        });
    
        Route::group(['prefix'=>'user'],function(){
            Route::get('/','AdminUserController@index')->name('admin.get.list.user');
            Route::get('add','AdminUserController@create')->name('admin.add.user');
            Route::post('add','AdminUserController@store');
            Route::get('update/{id}','AdminUserController@edit')->name('admin.edit.user');
            Route::post('update/{id}','AdminUserController@update');
            Route::get('/{action}/{id}','AdminUserController@action')->name('admin.action.user');
        });
    
        Route::group(['prefix'=>'admin'],function(){
            Route::get('/','AdminSelfController@index')->name('admin.get.list.admin');
            Route::get('add','AdminSelfController@create')->name('admin.add.admin');
            Route::post('add','AdminSelfController@store');
            Route::get('update/{id}','AdminSelfController@edit')->name('admin.edit.admin');
            Route::post('update/{id}','AdminSelfController@update');
            Route::get('/{action}/{id}','AdminSelfController@action')->name('admin.action.admin');
        });

        Route::group(['prefix'=>'contact'],function(){
            Route::get('/','AdminContactController@index')->name('admin.get.list.contact');
            Route::get('/{action}/{id}','AdminContactController@action')->name('admin.action.contact');
        });

        Route::group(['prefix'=>'post'],function(){
            Route::get('/','AdminPostController@index')->name('admin.get.list.post');
            Route::get('add','AdminPostController@create')->name('admin.add.post');
            Route::post('add','AdminPostController@store');
            Route::get('update/{id}','AdminPostController@edit')->name('admin.edit.post');
            Route::post('update/{id}','AdminPostController@update');
            Route::get('/{action}/{id}','AdminPostController@action')->name('admin.action.post');
        });
    });
  
});
