<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->insert([
            'city' => 'Brussel',
            'zip_code' => '1000',
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('cities')->insert([
            'city' => 'Brugge',
            'zip_code' => '8000',
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('cities')->insert([
            'city' => 'Ieper',
            'zip_code' => '8900',
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
