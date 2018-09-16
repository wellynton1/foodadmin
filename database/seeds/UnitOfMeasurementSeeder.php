<?php

use Illuminate\Database\Seeder;

class UnitOfMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_of_measurements')->insert([

            1 => ['name' => 'Gramas', 'active' => 1, 'created_by' => 1],
            2 => ['name' => 'Mililitros', 'active' => 1, 'created_by' => 1],
            3 => ['name' => 'Unidade', 'active' => 1, 'created_by' => 1]

        ]);
    }
}
