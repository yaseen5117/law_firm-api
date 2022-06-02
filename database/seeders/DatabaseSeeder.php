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
            
            DB::table('users')->truncate();
           
            $this->call([UsersTableSeeder::class]);
            $this->call([PetitionTypeSeeder::class]);
            $this->call([PetitionTableSeeder::class]);
            $this->call([RolesTableSeeder::class]);            
            $this->call([StatusesTableSeeder::class]);
            $this->call([PetitionIndexTableSeeder::class]);
            $this->call([AttachmentsTableSeeder::class]);

            $this->call([PetitionPetitionersTableSeeder::class]);
            $this->call([PetitionOpponentsTableSeeder::class]);
            $this->call([CourtSeeder::class]);
            $this->call([ContractCategoriesTableSeeder::class]);
            $this->call([OrderSheetTypesTableSeeder::class]);
                 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
