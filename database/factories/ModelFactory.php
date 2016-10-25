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
        'level_id' => rand(1, 4),
        'topic_id' => 1,
        'name' => $faker->sentence,
        'url' => $faker->url,
        'description' => $faker->paragraph,
        'expected_start_date' => $faker->dateTimeThisYear(),
        'expected_completion_date' => $faker->dateTimeThisYear(),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Level::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->slug,
    ];
});
