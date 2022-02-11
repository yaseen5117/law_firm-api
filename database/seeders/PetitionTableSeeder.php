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

            'client_id' => 5,   //petitioner
            'opponent_id' => 6,  
            'court_id' => 1,       
            'petition_type_id' => 1,    
            'case_no' => 'AS53434',
            'title' => 'WRIT PETITION UNDER ARTICLE 199 OF THE CONSTITUTION OF THE ISLAMIC REPUBLIC OF PAKISTAN, 1973',   
            'writ_number' => '1812 /2021',
            'judgement' => '',
            'order_sheet' => '',
            'status' => '',
            'display_order' => '1',           
             
        ]); 
        /*DB::table('petitions')->insert([
            
            'client_id' => 2,  
            'court_id' => 2,       
            'petition_type_id' => 2,    
            'case_no' => 'AS53434',
            'name' => 'Title of the Case',   
            'writ_number' => '1812 /2021',
            'judgement' => '',
            'order_sheet' => '',
            'status' => '',
            'display_order' => '2',           
             
        ]); 
        DB::table('petitions')->insert([
            
            'client_id' => 3,  
            'court_id' => 1,       
            'petition_type_id' => 1,    
            'case_no' => 'AS53434',
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
            'case_no' => 'AS53434',
            'name' => 'Title of the Case',   
            'writ_number' => '1812 /2021',
            'judgement' => '',
            'order_sheet' => '',
            'status' => '',
            'display_order' => '4',           
             
        ]);*/
    }
}
