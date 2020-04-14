<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@index')->name('index');
Route::resource('category', 'CategoryController');
Route::get('/price/{mix}/{max}', 'PriceController@show')->name('price.show');

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
// Route::view('/product', 'product');
// Route::view('/all-products', 'all-products');
Route::view('/cart', 'cart')->name("cart");
// Route::view('/checkout', 'checkout');
// Route::view('/thank-you', 'thank-you');
// Route::view('/master', 'master');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
