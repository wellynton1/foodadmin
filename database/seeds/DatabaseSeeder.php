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
         $this->call(StatusMenuSeeder::class);
         $this->call(UnitOfMeasurementSeeder::class);
         $this->call(StateSeeder::class);
         $this->call(CitySeeder::class);
    }
}
