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
        DB::table('statuses')->truncate();
        DB::table('statuses')->insert([

            'title' => 'Approved',             
            'display_order' => '1',           
             
        ]);
        DB::table('statuses')->insert([

            'title' => 'Reject',             
            'display_order' => '2',           
             
        ]);
        DB::table('statuses')->insert([

            'title' => 'Pending',             
            'display_order' => '3',           
             
        ]);
    }
}
