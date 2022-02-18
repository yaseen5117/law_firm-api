<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetitionOpponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petition_opponents')->truncate();
        DB::table('petition_opponents')->insert([

            'id' => 1,             
            'petition_id' => 1,
            'opponent_id' => 6,    
             
        ]);
    }
}
