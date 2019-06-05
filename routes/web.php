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
});
Route::post('newsletter', 'AdminUsersController@newsletter')->name('newsletter');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'active'], function () {
    Route::get('/index','HomeController@index');

});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','HomeController@index');

    Route::resource('/admin/months', 'AdminMonthsController');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/roles', 'AdminRolesController');

});
