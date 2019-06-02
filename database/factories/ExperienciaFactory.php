<?php

use Faker\Generator as Faker;

$factory->define(Prodesal\Experiencia::class, function (Faker $faker) {
    return [
        'nombre_exper' => $faker->name,
		'precio' => rand(2000,5000),
		'estado_exper' => $faker->randomElement(['ACTIVA', 'INACTIVA'])    
	];
});
