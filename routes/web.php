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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');

Route::get('/oeps', function () {
    return view('oeps');
})->name('oeps');



Route::post('newsletter', 'AdminUsersController@newsletter')->name('newsletter');
//Route::get('level1', 'MenuController@menu_level1')->name('level1');
Route::get('showProducts/{id}', 'MenuController@showProducts')->name('showProducts');
Route::get('product/{id}', 'MenuController@product')->name('product');
Route::get('cart', 'MenuController@cart')->name('cart');
Route::post('cart_add/{id}', 'MenuController@cart_add')->name('cart_add');
Route::post('cart_update/{id}', 'MenuController@cart_update')->name('cart_update');
Route::get('cart_delete/{id}', 'MenuController@cart_delete')->name('cart_delete');
Route::post('shipmentCost', 'MenuController@shipmentCost')->name('shipmentCost');

Route::get('step0', 'CheckoutController@step0')->name('step0');
Route::post('step1', 'CheckoutController@step1')->name('step1');
Route::post('step2', 'CheckoutController@step2')->name('step2');
Route::get('/step3/{id}', 'CheckoutController@step3')->name('step3');
Route::post('toPay/{id}', 'CheckoutController@store')->name('toPay');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'active'], function () {
    Route::get('/index','HomeController@index');

});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','HomeController@index')->name('admin');
    Route::get('notHandled', 'AdminOrdersController@notHandled')->name('notHandled');
    Route::get('lowStock', 'AdminProductsController@lowStock')->name('lowStock');

    Route::resource('/admin/months', 'AdminMonthsController');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/roles', 'AdminRolesController');
    Route::resource('/admin/level1categories', 'Level1CategoryController');
    Route::resource('/admin/level2categories', 'Level2CategoryController');
    Route::resource('/admin/products', 'AdminProductsController');
    Route::resource('/admin/countries', 'AdminCountriesController');
    Route::resource('/admin/orders', 'AdminOrdersController');
    Route::resource('/admin/types', 'AdminTypesController');


});
