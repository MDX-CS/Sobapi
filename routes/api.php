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

Route::resource('students.sobs', 'StudentSobController', [
    'only' => ['index', 'update']
]);

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

Route::resource('students.lessons', 'StudentLessonController', [
    'only' => ['index', 'update']
]);
