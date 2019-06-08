<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $toTruncate = ['users', 'roles', 'role_user', 'months', 'countries', 'cities', 'addresses', 'level1_categories', 'level2_categories'];

    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->toTruncate as $table){
            DB::table($table)->truncate();
        }
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(MonthsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(Level1CategoriesTableSeeder::class);
        $this->call(Level2CategoriesTableSeeder::class);
        $this->call(Level3CategoriesTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
