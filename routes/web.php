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
Route::get('sobs', 'SobController@index');

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
