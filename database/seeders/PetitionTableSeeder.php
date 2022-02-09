<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petitions')->truncate();
        DB::table('petitions')->insert([

            'client_id' => 1,  
            'court_id' => 1,       
            'petition_type_id' => 1,    
            'name' => 'Title of the Case',   
            'writ_number' => '1812 /2021',
            'judgement' => '',
            'order_sheet' => '',
            'status' => '',
            'display_order' => '1',           
             
        ]); 
        DB::table('petitions')->insert([
            
            'client_id' => 1,  
            'court_id' => 1,       
            'petition_type_id' => 1,    
            'name' => 'Title of the Case',   
            'writ_number' => '1812 /2021',
            'judgement' => '',
            'order_sheet' => '',
            'status' => '',
            'display_order' => '2',           
             
        ]); 
        DB::table('petitions')->insert([
            
            'client_id' => 1,  
            'court_id' => 1,       
            'petition_type_id' => 1,    
            'name' => 'Title of the Case',   
            'writ_number' => '1812 /2021',
            'judgement' => '',
            'order_sheet' => '',
            'status' => '',
            'display_order' => '3',           
             
        ]); 
        DB::table('petitions')->insert([
            
            'client_id' => 1,  
            'court_id' => 1,       
            'petition_type_id' => 1,    
            'name' => 'Title of the Case',   
            'writ_number' => '1812 /2021',
            'judgement' => '',
            'order_sheet' => '',
            'status' => '',
            'display_order' => '4',           
             
        ]);
    }
}
