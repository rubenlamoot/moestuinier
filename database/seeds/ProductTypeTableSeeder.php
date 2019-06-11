<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $types = ['1', '2', '3', '4', '5'];
        for($x = 1; $x < 101; $x++){
            DB::table('product_type')->insert([
                'product_id' => $x,
                'type_id' => array_rand($types) + 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        };
    }
}
