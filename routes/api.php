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
Route::delete('students/{student}/sobs/{sob}', 'StudentSobController@destroy');

/*
|--------------------------------------------------------------------------
| Lesson resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the lesson model are specified below.
|
*/

Route::resource('lessons', 'LessonController', [
    'except' => ['create', 'edit'],
]);

Route::get('students/{student}/lessons', 'StudentLessonController@index');
Route::post('students/{student}/lessons/{lesson}', 'StudentLessonController@store');
Route::delete('students/{student}/lessons/{lesson}', 'StudentLessonController@destroy');
