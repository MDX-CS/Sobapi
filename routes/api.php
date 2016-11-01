<?php

/*
|--------------------------------------------------------------------------
| Sob resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the sob model are specified below.
|
*/

Route::resource('sobs', 'SobController', [
    'except' => ['create', 'edit'],
]);

Route::get('students/{student}/sobs', 'StudentSobController@index');
Route::post('students/{student}/sobs/{sob}', 'StudentSobController@store');
