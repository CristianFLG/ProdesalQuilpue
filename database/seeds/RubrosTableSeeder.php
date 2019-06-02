<?php

use Illuminate\Database\Seeder;

class RubrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Prodesal\Rubro::class, 10)->create();        
    }
}
