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

// credit routes
Route::get('/', ['as' => 'credit.index', 'uses' => 'App\Http\Controllers\CreditController@index']);
Route::get('credit/create', ['as' => 'credit.create', 'uses' => 'App\Http\Controllers\CreditController@create']);
Route::post('credit/store', ['as' => 'credit.store', 'uses' => 'App\Http\Controllers\CreditController@store']);

//payment routes
Route::get('payment/create', ['as' => 'payment.create', 'uses' => 'App\Http\Controllers\PaymentController@create']);
Route::post('payment/store', ['as' => 'payment.store', 'uses' => 'App\Http\Controllers\PaymentController@store']);
