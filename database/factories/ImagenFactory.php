<?php

use Faker\Generator as Faker;

$factory->define(Prodesal\Imagen::class, function (Faker $faker) {
    return [
        'url_img' => $faker->imageUrl($width = 446, $height = 446),
		'estado_img' => $faker->randomElement(['ACTIVA'])
    ];
});
