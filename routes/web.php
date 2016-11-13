<?php

/*
|--------------------------------------------------------------------------
| Miscellaneous Web Routes
|--------------------------------------------------------------------------
|
| All uncategorized web routes.
|
*/

Route::get('', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Custom login routes.
|
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| Documentation Routes
|--------------------------------------------------------------------------
|
| All routes handling documentation are specified here. Contents
| are lited below.
|
| - Creating an Oauth client
| - Setting up the client side app
| - API Docs
|   - Student routes
|   - Staff routes
|   - Sob routes
|   - Level routes
|   - Topic routes
|   - Week routes
|
*/

Route::group(['prefix' => 'docs'], function () {
    Route::get('', 'DocumentationController@index');
    Route::get('endpoints', 'DocumentationController@endpoints');
    Route::get('student', 'DocumentationController@student');
});
