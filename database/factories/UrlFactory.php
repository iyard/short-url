<?php

/** @var Factory $factory */

use App\Url;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

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

$factory->define(Url::class, function (Faker $faker) {
    return [
        'url' => $faker->unique()->url,
        'token' => $faker->unique()->regexify("[A-Za-z0-9]{6}"),
    ];
});
