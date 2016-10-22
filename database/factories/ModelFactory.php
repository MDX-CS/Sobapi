<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Sob::class, function (Faker\Generator $faker) {
    return [
        'sob' => $faker->sentence,
        'url' => $faker->url,
        'level_id' => 1,
        'topic_id' => 1,
        'expected_start_date' => $faker->dateTimeThisYear(),
        'expected_completion_date' => $faker->dateTimeThisYear(),
        'sob_notes' => $faker->paragraph,
    ];
});
