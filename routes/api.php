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

Route::resource('topics.sobs', 'CategoryController', [
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

Route::resource('levels.sobs', 'DifficultyController', [
    'only' => ['index', 'update'],
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

/*
|--------------------------------------------------------------------------
| Student resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the resource are specified below.
|
*/

Route::resource('students', 'StudentController', [
    'except' => ['create', 'edit'],
]);

Route::resource('students.sobs', 'ObservationController', [
    'only' => ['index', 'update'],
]);

Route::resource('students.attendance', 'AttendanceController', [
    'only' => ['index', 'update'],
]);

Route::resource('students.timetable', 'TimetableController', [
    'only' => ['index', 'update'],
]);

/*
|--------------------------------------------------------------------------
| Staff resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the resource are specified below.
|
*/

Route::resource('staff', 'StaffController', [
    'except' => ['create', 'edit'],
]);

/*
|--------------------------------------------------------------------------
| Week resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the resource are specified below.
|
*/

Route::resource('weeks', 'WeekController', [
    'except' => ['create', 'edit'],
]);
