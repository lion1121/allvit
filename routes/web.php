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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Helpers\Parsers\Parser;

Route::get('/', function () {
    return view('home');
});
Route::get('/shop', function () {
    return view('front.shop');
});

Route::get('/array', function () {
    $parser = new \App\Helpers\Parsers\XmlParser('../public/temp_import_xml/import.xml');
    $parser->read();
    $parser->parse();
    $test = count($parser->xmlData->Каталог->Товары);
//    dd($test);
    $parser->writeProducts();
});

Route::get('/test', function () {
    $product = DB::table('products')->whereJsonContains('attributes->Вкус',['Апельсин (Orange)'])->get();
    dd($product);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    //Custom voyager pages
    Route::get('promocodes', 'Voyager\PromocodeController@index');
    Route::get('promocodes/edit/{id}', 'Voyager\PromocodeController@edit')->name('promocode.edit');
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
Route::group(['prefix' => 'ajax'], function () {
    Route::post('getAllCategories', 'ProdCategoryController@getAllCategories');
    Route::get('getProduct/{name}', 'ProductController@getProductByName');
    Route::post('addPromocode', 'Voyager\PromocodeController@store');
    Route::post('getCategories', 'Voyager\PromocodeController@getProdCategories');
});
//Route::post('/ajax/getCategories', 'ProdCategoryController@getCategories');