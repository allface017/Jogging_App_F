<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('jogs')->insert([
            'users_id' => 1, 
            'date' => now(),
            'distance' => 5, 
            'time' => 30, 
            'course' => 'storage\app\public\img\Screenshot_20230102-115505.png', 
            'location' => false, 
            'created_at' => now(),
            'updated_at' => now(),
            'deleteflg' => false,
        ]);
    }
}
