<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RubrosTableSeeder::class);
        $this->call(ProductoresTableSeeder::class);
        $this->call(ExperienciasTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(ImagenesTableSeeder::class);
        
    }
}
