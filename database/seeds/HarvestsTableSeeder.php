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
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
