<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->paragraph(20),
        'image' => $faker->sentence(5),
        'users_id' => factory(App\User::class),
        'categories_id' => factory(App\Category::class)
    ];
});