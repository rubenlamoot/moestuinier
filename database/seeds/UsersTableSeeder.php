<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\User', 5)->create();

        DB::table('users')->insert([
            'is_active' => 1,
            'first_name' => 'Test1',
            'last_name' => 'Tester1',
            'email' => 'test1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt(123456),
            'remember_token' => Str::random(10),
            'privacy' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'is_active' => 1,
            'first_name' => 'Ruben',
            'last_name' => 'Lamoot',
            'email' => 'rubenlamoot@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt(123456),
            'remember_token' => Str::random(10),
            'privacy' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
