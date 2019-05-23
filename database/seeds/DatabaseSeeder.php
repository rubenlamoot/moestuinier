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
    protected $toTruncate = ['users', 'roles', 'role_user', 'months'];

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

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
