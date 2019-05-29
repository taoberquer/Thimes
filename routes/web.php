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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->namespace('Club')->prefix('club')->name('club.')->group(function () {
    Route::middleware('club.create')->group(function () {
        Route::get('/create', 'CreateController@create')->name('create');
        Route::post('/create', 'CreateController@store')->name('store');
    });

    Route::middleware('club.manage')->group(function () {
        Route::get('/', 'MainController@index')->name('index');
    });
});
