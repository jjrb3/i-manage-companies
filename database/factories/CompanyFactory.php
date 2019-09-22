<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'logo' => $faker->imageUrl(),
        'website' => $faker->url,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
