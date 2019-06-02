<?php

use Faker\Generator as Faker;

$factory->define(Prodesal\Rubro::class, function (Faker $faker) {


    return [
        'nombre_rubro' => $faker->name,
		'temporada' => $faker->text(50)
		
    ];
});
