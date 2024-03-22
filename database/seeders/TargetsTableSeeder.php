<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('targets')->insert([    
            'users_id' => 1, 
            'target_distance' => 2.3, 
            'reward' => "焼肉",
            'achieveflg' => false,
            'deleteflg' => false,
        ]);
    }
}
