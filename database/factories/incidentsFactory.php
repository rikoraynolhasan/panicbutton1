<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\incidents;
use Faker\Generator as Faker;

$factory->define(incidents::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
