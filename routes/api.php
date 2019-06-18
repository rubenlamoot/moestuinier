<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('months', 'AdminMonthsController@home')->name('months.home');
Route::post('searchProducts', 'MenuController@searchProducts')->name('searchProducts');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
