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

Route::patch('sobs/{sob}/levels/{level}', 'SobController@update');

/*
|--------------------------------------------------------------------------
| Level resource routes
|--------------------------------------------------------------------------
|
| All routes associated with the level model are specified below.
|
*/

Route::resource('levels', 'LevelController', [
    'except' => ['create', 'edit'],
]);
