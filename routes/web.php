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


Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
], function () {

    Route::get('/', function () {
        return redirect()->route('orders.index');
    });
});

Route::post('payment/transaction/success', 'App\Http\Controllers\TransactionsController@transaction')->name('payment-success');
Route::post('payment/create-paytabs-page', 'App\Http\Controllers\TransactionsController@paytabsPage')->name('paytabs-page');
Route::get('products/checkout/{product_id}', 'App\Http\Controllers\ProductsController@getCheckoutProducts')->name('checkout-products');
Route::resource('products', 'App\Http\Controllers\ProductsController');
Route::resource('orders', 'App\Http\Controllers\OrdersController');
Route::resource('transactions', 'App\Http\Controllers\TransactionsController');
