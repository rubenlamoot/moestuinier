<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Level3CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('level3_categories')->insert(['name' => 'Tomaten', 'level2_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level3_categories')->insert(['name' => "Paprika's en pepers", 'level2_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level3_categories')->insert(['name' => 'Komkommers en augurken', 'level2_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level3_categories')->insert(['name' => 'Sla', 'level2_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level3_categories')->insert(['name' => 'Aardbeien', 'level2_category_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level3_categories')->insert(['name' => 'Blauwe bessen', 'level2_category_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level3_categories')->insert(['name' => 'Overig fruit', 'level2_category_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
    }
}
