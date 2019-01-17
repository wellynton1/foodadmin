<?php

use Illuminate\Database\Seeder;

class StatusOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_orders')->insert([

            1 => ['name' => 'Em andamento', 'active' => 1, 'created_by' => 1],
            2 => ['name' => 'Finalizado', 'active' => 1, 'created_by' => 1]

        ]);
    }
}
