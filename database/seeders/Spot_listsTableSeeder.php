<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Spot_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spot_lists')->insert([
            'jogs_id' => 1, 
            'spots_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('spot_lists')->insert([
            'jogs_id' => 1, 
            'spots_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('spot_lists')->insert([
            'jogs_id' => 1, 
            'spots_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
