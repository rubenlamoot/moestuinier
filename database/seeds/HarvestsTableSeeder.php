<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HarvestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('harvests')->insert([
            'jul' => 1,
            'aug' => 1,
            'sep' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
