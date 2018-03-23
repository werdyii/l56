<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' 	=> $faker->numberBetween(1,10),
        'title' 	=> $faker->sentence,
        'content' 	=> $faker->paragraph,
        'created_at' => $faker->dateTimeBetween( $startDate = '-3 years', $endDate = 'now', $timezone = 'Europe/Bratislava' )
    ];
});
