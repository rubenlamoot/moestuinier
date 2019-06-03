<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('addresses')->insert([
            'street' => 'De straat',
            'house_nr' => '7',
            'bus_nr' => '5A',
            'city_id' => 1,
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('addresses')->insert([
            'street' => 'Testlaan',
            'house_nr' => '1',
            'city_id' => 2,
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('addresses')->insert([
            'street' => 'Adminstraat',
            'house_nr' => '8',
            'city_id' => '3',
            'country_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
