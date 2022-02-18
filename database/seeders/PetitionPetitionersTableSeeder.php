<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetitionPetitionersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petition_petitioners')->truncate();
        DB::table('petition_petitioners')->insert([

            'id' => 1,             
            'petition_id' => 1,
            'petitioner_id' => 5,    
             
        ]);
    }
}
