<?php

use Illuminate\Database\Seeder;

class ExperienciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	factory(Prodesal\Experiencia::class, 6)->create();    
	}
}
