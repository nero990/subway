<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'status' => $faker->randomElement(["OPEN", "CLOSED"]),
        'eaten_at' => now(),
    ];
});
