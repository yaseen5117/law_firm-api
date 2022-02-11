<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetitionIndexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */     
    public function run()
    {
        DB::table('petition_indices')->truncate();
        DB::table('petition_indices')->insert([

            'id' => 1,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Writ Petition along with Affidavit',  
            'date' => null,
            'annexure' => '',        
            'page_info' => '1-15',                 
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 2,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Copy of Impugned Turmintion Order',  
            'date' => '2021.12.02',  
            'annexure' => 'A',     
            'page_info' => '16-17',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 3,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Copy of Contract of the Petitioner',  
            'date' => '2021.05.04',  
            'annexure' => 'B',     
            'page_info' => '18-19',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 4,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Copy of the Additional Charge Notification',  
            'date' => '2021.09.20',  
            'annexure' => 'C',     
            'page_info' => '20-22',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 5,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Copy of the Complaint Submitted to the Ombudsman',  
            'date' => '2021.11.01',  
            'annexure' => 'D',     
            'page_info' => '23-42',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 6,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Copy of the Petitioner Urgent Email to the Respodent',  
            'date' => '2021.11.30',  
            'annexure' => 'E',     
            'page_info' => '43',                
             
        ]);
        DB::table('petition_indices')->insert([

            'id' => 7,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Copy of the Civil Suit Seeking Pre-termination hearing',  
            'date' => '2021.12.01',  
            'annexure' => 'F',     
            'page_info' => '44-50',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 8,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Copy of the Stay Order passed by ADJ',  
            'date' => '2021.12.02',  
            'annexure' => 'G',     
            'page_info' => '51',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 9,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Application for Exemption of Certified Copies Along With Affidavit',  
            'date' => null,  
            'annexure' => '',     
            'page_info' => '52-53',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 10,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Application for Intirem Relief Along with Affidavit',  
            'date' => null,  
            'annexure' => '',     
            'page_info' => '54-55',                
             
        ]); 
        DB::table('petition_indices')->insert([

            'id' => 11,
            'petition_id' => 1,   //petitioner
            'document_description' => 'Power of Attorney',  
            'date' => null,  
            'annexure' => '',     
            'page_info' => '56-57',                
             
        ]); 
    }
}
