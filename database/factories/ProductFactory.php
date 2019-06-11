<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Level2Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $categories = Level2Category::pluck('id')->toArray();
    $names = ['Tomaat', 'Paprika', 'Komkommer', 'Sla', 'Aardbei', 'Blauwe bes', 'Aardappel', 'Ui', 'Look'];

    return [
        'level2_category_id' => $faker->randomElement($categories),
        'name' => $faker->randomElement($names) . ' ' . $faker->word,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50),
        'photo' => 'product1.jpg',
        'stock' => $faker->numberBetween($min = 0, $max = 50),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
