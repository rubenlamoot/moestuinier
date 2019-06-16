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
            'shipment' => '2.00',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Duitsland',
            'shipment' => '7.00',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Frankrijk',
            'shipment' => '7.00',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Luxemburg',
            'shipment' => '3.00',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('countries')->insert([
            'country' => 'Nederland',
            'shipment' => '5.00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
