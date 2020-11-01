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

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-z]{2}'], 'middleware' => 'App\Http\Middleware\SetLocale'], function () {

  Route::get('/', 'App\Http\Controllers\LandingPageController@index')->name('main.index');

  Route::post('/checkout', 'App\Http\Controllers\CheckoutController@store')
  ->name('checkout.store');
  Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')
  ->name('checkout.index');

  Route::post('/catalog', 'App\Http\Controllers\CatalogController@itemsInfo')
  ->name('catalog.items.info');
});
