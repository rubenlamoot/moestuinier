<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Level2CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('level2_categories')->insert(['name' => 'Tomaten', 'level1_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => "Paprika's en pepers", 'level1_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Komkommers en augurken', 'level1_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Sla', 'level1_category_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Aardbeien', 'level1_category_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Blauwe bessen', 'level1_category_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Overig fruit', 'level1_category_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Aardappelen', 'level1_category_id' => 4, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Uien', 'level1_category_id' => 4, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Look', 'level1_category_id' => 4, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => '1-jarigen', 'level1_category_id' => 3, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Doorlevend', 'level1_category_id' => 3, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Gereedschap', 'level1_category_id' => 5, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Zaaitafels', 'level1_category_id' => 5, 'created_at' => now(), 'updated_at' => now()]);
        DB::table('level2_categories')->insert(['name' => 'Potgrond en mest', 'level1_category_id' => 5, 'created_at' => now(), 'updated_at' => now()]);
    }
}
