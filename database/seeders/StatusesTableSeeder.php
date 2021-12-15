<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petition_statuses')->truncate();
        DB::table('petition_statuses')->insert([

            'id' => 1,             
            'title' => 'Submitted',             
            'display_order' => '1',           
             
        ]);

        DB::table('petition_statuses')->insert([

            'id' => 2,             
            'title' => 'Approved',             
            'display_order' => '2',           
             
        ]);

        DB::table('petition_statuses')->insert([

            'id' => 3,             
            'title' => 'In Progress',             
            'display_order' => '3',           
             
        ]);

        DB::table('petition_statuses')->insert([

            'id' => 4,             
            'title' => 'Closed',             
            'display_order' => '4',           
             
        ]);
    }
}
