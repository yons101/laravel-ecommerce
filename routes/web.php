<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\CategoryController;

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
// Route::resource('cart', 'CartController');
Route::get('/price/{mix}/{max}', 'PriceController@show')->name('price.show');

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
// Route::view('/product', 'product');
// Route::view('/all-products', 'all-products');
// Route::view('/cart', 'cart')->name("cart");
// Route::view('/checkout', 'checkout');
// Route::view('/thank-you', 'thank-you');
// Route::view('/master', 'master');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::resource('productmanager', 'ProductManagerController');
    Route::resource('usermanager', 'UserManagerController');
    Route::resource('ordermanager', 'OrderManagerController');


    //Orders
    Route::resource('/order', 'OrderController');

    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

    //cart
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');

    Route::post('/cart/empty', 'CartController@empty')->name('cart.empty');
    Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
    Route::put('/cart/{id}', 'CartController@update')->name('cart.update');


    //Profile
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('/profile/{id}', 'ProfileController@update')->name('profile.update');
});
