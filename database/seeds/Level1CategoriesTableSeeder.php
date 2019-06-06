<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Level1CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('level1_categories')->insert(['name' => 'Zaadjes', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level1_categories')->insert(['name' => 'Plantgoed', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level1_categories')->insert(['name' => 'Kruiden', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level1_categories')->insert(['name' => 'Accessoires', 'created_at' => now(), 'updated_at' => now()]);
    }
}
