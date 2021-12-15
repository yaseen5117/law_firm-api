<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courts')->truncate();
        DB::table('courts')->insert([

            'id' => 1,
            'title' => 'Hight Court',
            'display_order' => '1',
            
        ]); 

        DB::table('courts')->insert([

            'id' => 2,
            'title' => 'Supreme Court',
            'display_order' => '2',
            
        ]);   
    }
}
