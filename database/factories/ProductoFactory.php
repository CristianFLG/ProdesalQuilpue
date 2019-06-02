<?php

use Faker\Generator as Faker;

$factory->define(Prodesal\Producto::class, function (Faker $faker) {
    return [
        'id_rubro' => rand(1,10),
        'nombre_producto' => $faker->name,
        'stock' => rand(1,200),
        'precio' => rand(1500,5000)
            ];
});
