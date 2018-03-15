<?php

use Faker\Generator as Faker;

$factory->define(App\Market::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'city' => $faker->city,
        'website' => $faker->unique()->domainName,
    ];
});
