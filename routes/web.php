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
    if(Auth::check()){
        if(Auth::user()->admin) {
            return view('dashboard');
        }
        else
            return view('home');
    }
    return view('login');
});

Auth::routes();

Route::group(['middleware'=>'admin:1'],function (){
    Route::get('/dashboard','PagesController@show_admin')->name('show_admin');
    Route::get('/dashboard/category','CategoryController@index')->name('index_category');
    Route::get('/dashboard/category/create_category','CategoryController@create')->name('create_category');
    Route::post('/dashboard/category/store_category','CategoryController@store')->name('store_category');
    Route::get('/dashboard/category/delete_category/{id}','CategoryController@destroy')->name('delete_category');
    Route::get('/dashboard/category/edit_category/{id}','CategoryController@edit')->name('edit_category');
    Route::post('/dashboard/category/update_category/{id}','CategoryController@update')->name('update_category');

    Route::get('/dashboard/cat_{id}/product','ProductController@index')->name('index_product');
    Route::get('/dashboard/product/create_product','ProductController@create')->name('create_product');
    Route::post('/dashboard/product/store_product','ProductController@store')->name('store_product');
    Route::get('/dashboard/product/delete_product/{id}','ProductController@destroy')->name('delete_product');
    Route::get('/dashboard/product/edit_product/{id}','ProductController@edit')->name('edit_product');
    Route::post('/dashboard/product/update_product/{id}','ProductController@update')->name('update_product');

});

Route::group(['middleware'=>'admin:'],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/category/{id}','ProductController@userview')->name('product_user');
});

Route::get('/Login','PagesController@show_login')->name('show_login');
Route::get('/Register','PagesController@show_reg')->name('show_reg');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/cart','CartController@show_cart')->name('show_cart');
Route::get('/addtocart/{id}/{count}','CartController@store_session')->name('add_to_cart');
Route::get('/empty','CartController@empty_session')->name('empty_cart');

Route::get('/storemycart','CartController@save_my_cart')->name('save_my_cart');
Route::get('/getmycart','CartController@get_my_cart')->name('get_my_cart');
Route::get('/emptycart','CartController@empty_cart')->name('empty_cart_db');
