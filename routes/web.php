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

Route::get('catalog/{category}/{product}', 'ShopController@showProduct')->where('product', '[0-9]+-[a-zA-Z0-9_-]+')->name('product');
Route::get('catalog/{category}', 'ShopController@show')->where('category', '[a-zA-Z0-9/_-]+')->name('category');


//    Route::get('product/{category?}/{subcategory?}/{subsubcategory?}/{product?}', 'ShopController@show')->name('product');
//    Route::get('{category?}/{subcategory?}/{subsubcategory?}', 'ShopController@showCategories')->name('category');

//Route::get('/shop/cart','CartController@index')->name('cart');

Route::get('/test', function () {
//    $product = DB::table('products')->whereJsonContains('attributes->Вкус',['Green Apple Envy'])->get();

    $c = App\ProdCategory::with(['products', 'subcategories.products'])->find(36)->subcategories()->get();
    $original = new Collection();
    foreach ($c as $item) {
        $original = $original->merge($item->products()->get());
    }

    dd($original);

});


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
