<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'level2_category_id' => $faker->firstName,
        'name' => $faker->lastName,
        'description' => $faker->unique()->safeEmail,

    ];
});
