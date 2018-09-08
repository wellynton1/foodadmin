<?php

use Illuminate\Database\Seeder;

class StatusMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_menus')->insert([

            1 => ['name' => 'Status 1'],
            2 => ['name' => 'Status 2']

        ]);
    }
}
