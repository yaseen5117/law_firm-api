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
            'title' => 'THE ISLAMABAD HIGH COURT, ISLAMABAD'             
        ]);    
        DB::table('courts')->insert([
            'title' => 'SUPREME COURT OF PAKISTAN'             
        ]);    
        DB::table('courts')->insert([
            'title' => 'PESHAWAR HIGH COURT'             
        ]);    
        DB::table('courts')->insert([
            'title' => 'BALOCHISTAN HIGH COUT'             
        ]);    
        DB::table('courts')->insert([
            'title' => 'LAHORE HIGH COURT'             
        ]);       
        DB::table('courts')->insert([
            'title' => 'HIGH COURT OF SINDH'             
        ]);
    }
}
