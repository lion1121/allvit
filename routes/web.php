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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/shop', function () {
    return view('front.shop');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    //Custom voyager pages
    Route::get('promocode','Voyager\PromocodeController@index');
});

//Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/home', 'HomeController@index')->name('home');

//Facebook, Google auth routes
Route::get('auth/{provider}', 'Auth\loginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\loginController@handleProviderCallback');

////Custom voyager pages
//Route::get('/admin/promocode','Voyager\PromocodeController@index');

//Ajax routes
Route::group(['prefix' => 'ajax'], function(){
   Route::post('getCategories', 'ProdCategoryController@getCategories');
   Route::get('getProduct/{name}', 'ProductController@getProductByName');
   Route::post('addPromocode', 'Voyager\PromocodeController@store');
});
//Route::post('/ajax/getCategories', 'ProdCategoryController@getCategories');