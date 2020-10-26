<?php

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

Route::redirect('/', '/ru');

Route::group(['prefix' => '{language}', 'where' => ['language' => '[a-z]{2}'], 'middleware' => 'App\Http\Middleware\SetLanguage'], function () {

  Route::get('/', 'App\Http\Controllers\LandingPageController@index')->name('main.index');

  Route::post('/cart', 'App\Http\Controllers\CartController@store')
  ->name('cart.store');
  Route::get('/cart', 'App\Http\Controllers\CartController@empty')
  ->name('cart.empty');
  Route::delete('/cart/{product}', 'App\Http\Controllers\CartController@destroy')
  ->name('cart.destroy');
  Route::patch('/cart/{product}', 'App\Http\Controllers\CartController@update')
  ->name('cart.update');
  Route::get('/cartInfo', 'App\Http\Controllers\CartController@cartInfo')
  ->name('cart.info');

  Route::post('/checkout', 'App\Http\Controllers\CheckoutController@store')
  ->name('checkout.store');
  Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')
  ->name('checkout.index');

  Route::post('/get_settings', 'App\Http\Controllers\SettingsController@index')
  ->name('settings.index');

  Route::post('/messout', 'App\Http\Controllers\MessageOutController@sendToTelegramAndEmail')
  ->name('messout.sendmessage');

  Route::get('/catalog', 'App\Http\Controllers\CatalogController@index')
  ->name('catalog.info');
  Route::post('/catalog', 'App\Http\Controllers\CatalogController@itemsInfo')
  ->name('catalog.items.info');
});

Route::group(['prefix' => 'admin'], function () {
    \Voyager::routes();
});
