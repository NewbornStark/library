<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'author' => $faker->name,
        'title' => $faker->text(255),
        'description' => $faker->text(500),
        'published' => $faker->date('Y-m-d'),
    ];
});
