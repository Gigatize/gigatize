<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->city . ", " . $faker->stateAbbr ,
    ];
});
