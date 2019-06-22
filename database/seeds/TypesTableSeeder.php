<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert(['name' => 'zakje 25 zaadjes', 'discount' => 0, 'percentage' => 0, 'times_price' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => 'zakje 50 zaadjes', 'discount' => 1, 'percentage' => 25, 'times_price' => 2, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => 'zak 500 gr', 'discount' => 0, 'percentage' => 0, 'times_price' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => 'zak 1 kg', 'discount' => 1, 'percentage' => 25, 'times_price' => 2, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => '1 stuk', 'discount' => 0, 'percentage' => 0, 'times_price' => 1, 'created_at' => now(), 'updated_at' => now()]);
    }
}
