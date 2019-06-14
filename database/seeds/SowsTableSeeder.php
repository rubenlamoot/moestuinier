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
            'mar' => 1,
            'apr' => 1,
            'mai' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
