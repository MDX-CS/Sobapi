<?php

/*
|--------------------------------------------------------------------------
| Miscellaneous Web Routes
|--------------------------------------------------------------------------
|
| All uncategorized web routes.
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/home', 'HomeController@index');

Route::get('sobs', function () {
    return view('sobs.index');
})->middleware('auth');

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
