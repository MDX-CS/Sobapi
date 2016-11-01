<?php

use Carbon\Carbon;

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
$factory->define(App\Models\Staff::class, function (Faker\Generator $faker) {
    return [
        'network_name' => $faker->username,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'password' => bcrypt('secret'),
        'enc_id' => str_random(20),
        'email' => $faker->unique()->safeEmail,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Student::class, function (Faker\Generator $faker) {
    return [
        'staff_id' => 1,
        'network_name' => $faker->username,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'student_number' => $faker->postcode,
        'student_status' => 1,
        'enc_id' => str_random(20),
        'last_login' => Carbon::now(),
        'last_activity' => Carbon::now(),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Sob::class, function (Faker\Generator $faker) {
    return [
        'level_id' => rand(1, 4),
        'topic_id' => 1,
        'sob' => $faker->sentence,
        'url' => $faker->url,
        'sob_notes' => $faker->paragraph,
        'expected_start_date' => $faker->dateTimeThisYear(),
        'expected_completion_date' => $faker->dateTimeThisYear(),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Capability::class, function (Faker\Generator $faker) {
    return [
        'capability_description' => $faker->sentence,
    ];
});
