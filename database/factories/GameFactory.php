<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        "game_date" 	=> $faker->dateTimeBetween( $startDate = '-6 years', $endDate = 'now', $timezone = 'Europe/Bratislava' ),
        "invitation" 	=> $faker->sentence,
        "reviews" 		=> $faker->paragraph ,
    ];
});
