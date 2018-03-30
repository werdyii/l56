<?php

use Faker\Generator as Faker;

$factory->define(App\Season::class, function (Faker $faker) {
	$start_date = $faker->date("Y-m-d", $max = 'now');
    return [
        "name" => $faker->sentence,
        "start_date" => $start_date,
        "end_date" => date( "Y-m-d", strtotime( $start_date." +10 month")),
    ];
});
