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
| All routes handling documentation are specified here.
|
*/

Route::group(['prefix' => 'docs'], function () {
    Route::get('', 'DocumentationController@index');
    Route::get('endpoints', 'DocumentationController@endpoints');

    Route::get('requests', 'DocumentationController@requests');
    Route::get('responses', 'DocumentationController@responses');

    Route::get('student', 'DocumentationController@student');
    Route::get('staff', 'DocumentationController@staff');
    Route::get('sob', 'DocumentationController@sob');
    Route::get('lesson', 'DocumentationController@lesson');
    Route::get('level', 'DocumentationController@level');
    Route::get('topic', 'DocumentationController@topic');
    Route::get('week', 'DocumentationController@week');
});
