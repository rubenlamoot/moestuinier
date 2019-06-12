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
        for($x = 1; $x < 101; $x++){
            DB::table('sows')->insert([
                'product_id' => $x,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        };
    }
}
