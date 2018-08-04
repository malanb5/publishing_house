<?php

use Faker\Generator as Faker;
use App\Models\Book;

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

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'description' => $faker->realText($maxNbChars = 250, $indexSize = 2),
        'author_id' => $faker->numberBetween($min = 1, $max = 10),
        'publisher_id' => $faker->numberBetween($min = 1, $max = 50),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'published_at' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
