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
Route::get('/fluxes/{fluxId}', 'FluxesController@index')->name('flux.index');
Route::get('/sports/{sportId}', 'SportsController@index')->name('sport.index');

Route::middleware('auth')->group(function () {
   Route::get('/settings', 'SettingsController@edit')->name('settings.edit');
   Route::put('/settings', 'SettingsController@update')->name('settings.update');
});

Route::middleware('auth')->namespace('Club')->prefix('club')->name('club.')->group(function () {
    Route::middleware('club.create')->group(function () {
        Route::get('/create', 'CreateController@create')->name('create');
        Route::post('/create', 'CreateController@store')->name('store');
    });

    Route::middleware('club.manage')->group(function () {
        Route::get('/', 'MainController@index')->name('index');
        Route::get('/interesting/articles', 'MainController@interestingArticles')->name('interesting.articles');
        Route::post('/{articleId}/addArticleToClub', 'MainController@addArticleToClub')->name('addArticleToClub');
        Route::post('/{articleId}/removeAddedArticle', 'MainController@removeAddedArticle')->name('removeAddedArticle');
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::post('/{categoryId}/addCategoryToClub', 'CategoryController@addCategoryToClub')->name('addCategoryToClub');
            Route::post('/{categoryId}/removeCategoryArticle', 'CategoryController@removeCategoryArticle')->name('removeCategoryArticle');
        });
    });
});

Route::middleware('auth')->prefix('clubs')->name('clubs.')->group(function () {
    Route::get('/search', 'ClubsController@search')->name('search');
    Route::prefix('/{clubId}')->group(function () {
        Route::get('/rss', 'ClubsController@showRss')->name('rss');
    });
});
