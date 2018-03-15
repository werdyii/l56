<?php

use Faker\Generator as Faker;

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        'url' => $faker->unique()->url,
        'hash'=> $faker->unique()->regexify('[a-z0-9A-Z]{6}'),
        'used'=> $faker->numberBetween(0,100)
    ];
});
