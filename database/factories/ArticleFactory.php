<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->paragraph(20),
        'image' => $faker->sentence(5),
        'users_id' => factory(App\User::class),
        'categories_id' => factory(App\Models\Category::class)
    ];
});