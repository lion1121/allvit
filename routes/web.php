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

use App\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', 'AppController@index')->name('home');

Route::group(['prefix' => 'api'], function () {
    Route::get('{category}/{product}', 'Api\ShopController@showProduct')->where('category', '[a-zA-Z0-9/_-]+')->where('product', '([a-zA-Z_-]+|[0-9_-]+)+([0-9_-]+|[a-zA-Z_-]+)+([a-zA-Z_-]+|[0-9_-]+)+[a-zA-Z_-]+[0-9_-]+')->name('product');
    Route::get('{path}', 'Api\ShopController@show')->where('path', '[a-zA-Z0-9/_-]+')->name('category');
});

//Route::get('category', function (){
//    return view('front.shop.shop-empty');
//});

Route::group(['prefix' => 'catalog'], function () {
    Route::get('{category}/{product}', 'ShopController@showProduct')->where('category', '[a-zA-Z0-9/_-]+')->where('product', '([a-zA-Z_-]+|[0-9_-]+)+([0-9_-]+|[a-zA-Z_-]+)+([a-zA-Z_-]+|[0-9_-]+)+[a-zA-Z_-]+[0-9_-]+')->name('product');
    Route::get('{path}', 'ShopController@show')->where('path', '[a-zA-Z0-9/_-]+')->name('category');
});



Route::get('/test', 'ShopController@index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    //Custom voyager pages
    Route::get('promocodes', 'Voyager\PromocodeController@index');
    Route::get('promocodes/edit/{id}', 'Voyager\PromocodeController@edit')->name('promocode.edit');
});

Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');


//Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/home', 'HomeController@index')->name('home');

//Facebook, Google auth routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

////Custom voyager pages
//Route::get('/admin/promocode','Voyager\PromocodeController@index');

//Ajax routes
Route::group(['prefix' => 'ajax'], function () {
    Route::post('getAllCategories', 'ProdCategoryController@getAllCategories');
    Route::get('getProduct/{name}', 'ProductController@getProductByName');
    Route::post('addPromocode', 'Voyager\PromocodeController@store');
    Route::post('getCategories', 'Voyager\PromocodeController@getProdCategories');
});
