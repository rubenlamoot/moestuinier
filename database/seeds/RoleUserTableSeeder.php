<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($x = 1; $x < 7; $x++){
            DB::table('role_user')->insert([
                'role_id' => 2,
                'user_id' => $x,
            ]);
        };
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 7,
        ]);

    }
}
