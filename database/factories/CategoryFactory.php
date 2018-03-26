<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'icon_path' => $faker->imageUrl($width = 30, $height = 30),
    ];
});
