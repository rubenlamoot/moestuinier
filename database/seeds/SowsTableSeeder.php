<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('sows')->insert([
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
