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
        DB::table('types')->insert(['name' => 'zakje 25 zaadjes', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => 'zakje 50 zaadjes', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => 'zak 500 gr', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => 'zak 1 kg', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('types')->insert(['name' => '1 stuk', 'created_at' => now(), 'updated_at' => now()]);
    }
}
