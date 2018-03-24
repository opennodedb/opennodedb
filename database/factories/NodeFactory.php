<?php

use Faker\Generator as Faker;

$factory->define(App\Node::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mast_height' => $faker->randomDigit,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
    ];
});
