<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserIncident;
use Faker\Generator as Faker;

$factory->define(UserIncident::class, function (Faker $faker) {

    return [
        'user_data_id' => $faker->randomDigitNotNull,
        'incident_id' => $faker->randomDigitNotNull,
        'latitude' => $faker->word,
        'longitude' => $faker->word,
        'tanggal' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
