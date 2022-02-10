<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {           
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
           
            $this->call([UsersTableSeeder::class]);
            $this->call([PetitionTypeSeeder::class]);
            $this->call([PetitionTableSeeder::class]);
            $this->call([RolesTableSeeder::class]);            
            $this->call([StatusesTableSeeder::class]);

                 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
