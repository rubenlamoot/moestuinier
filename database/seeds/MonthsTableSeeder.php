<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('months')->insert([
            'month' => 'Januari',
            'month_text' => 'De lente lijkt nog heel ver weg, zo hartje winter. Maar bij een knetterend haardvuur plannen maken, zaden bestellen en dromen van een volle moestuin is eigenlijk ook een beetje moestuinieren - mentaal dan.',
            'month_pic' => 'home/januari.jpg',
            'created_at' => now(),
            'updated_at' => now()
            ]);
        DB::table('months')->insert([
            'month' => 'Februari',
            'month_text' => 'Februari is de maand van de hoop: aan kleine dingetjes kun je zien dat de lente op komst is. Het lengen van de dagen, de eerste bloembollen die bovenkomen en nu en dan al eens een warme dag...',
            'month_pic' => 'home/februari.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'Maart',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/maart.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'April',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/april.JPG',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'Mei',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/mei.JPG',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'Juni',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/juni.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'Juli',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/juli.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'Augustus',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/augustus.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'September',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/september.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'Oktober',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/oktober.JPG',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'November',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/november.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('months')->insert([
            'month' => 'December',
            'month_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...',
            'month_pic' => 'home/december.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
