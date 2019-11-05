<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookCategories;
use Faker\Generator as Faker;

$factory->define(BookCategories::class, function (Faker $faker) {
    return [
        'id_book' => function() {
            return App\Book::first()->inRandomOrder()->value('id');
        },
        'id_category' => function() {
            return App\Category::first()->inRandomOrder()->value('id');
        },
    ];
});
