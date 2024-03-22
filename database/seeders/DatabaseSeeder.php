<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(SpotsTableSeeder::class);
        // $this->call(JogsTableSeeder::class);
        // $this->call(Spot_listsTableSeeder::class);
        $this->call(TargetsTableSeeder::class);
        
    }
}
