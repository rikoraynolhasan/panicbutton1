<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\data_users;
use Faker\Generator as Faker;

$factory->define(data_users::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'no_ktp' => $faker->word,
        'alamat' => $faker->word,
        'no_hp' => $faker->word,
        'pekerjaan' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
