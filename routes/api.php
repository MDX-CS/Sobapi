<?php

/*
|--------------------------------------------------------------------------
| Sob resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the resource are specified below.
|
*/

Route::resource('sobs', 'SobController', [
    'except' => ['create', 'edit'],
]);

Route::resource('students.sobs', 'StudentSobController', [
    'only' => ['index', 'update'],
]);

Route::resource('levels.sobs', 'LevelSobController', [
    'only' => ['index', 'update'],
]);

Route::resource('topics.sobs', 'TopicSobController', [
    'only' => ['index', 'update'],
]);

/*
|--------------------------------------------------------------------------
| Lesson resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the resource are specified below.
|
*/

Route::resource('lessons', 'LessonController', [
    'except' => ['create', 'edit'],
]);

Route::resource('students.lessons', 'StudentLessonController', [
    'only' => ['index', 'update'],
]);

/*
|--------------------------------------------------------------------------
| Level resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the resource are specified below.
|
*/

Route::resource('levels', 'LevelController', [
    'except' => ['create', 'edit'],
]);

/*
|--------------------------------------------------------------------------
| Topic resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the resource are specified below.
|
*/

Route::resource('topics', 'TopicController', [
    'except' => ['create', 'edit'],
]);
