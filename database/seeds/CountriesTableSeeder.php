<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('countries')->insert([
            'country' => 'België',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Duitsland',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Frankrijk',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Luxemburg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Nederland',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
