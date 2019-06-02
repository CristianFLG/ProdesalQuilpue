<?php

use Faker\Generator as Faker;

$factory->define(Prodesal\Productor::class, function (Faker $faker) {
    return [
    'nombre' => $faker->name,
	'apellidos' =>$faker->name,
	'telefono' =>rand(0,9),
	'lugar' => $faker->text(20),
	'publicaciones' => $faker->text(500)  ];
});
