<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attachments')->truncate();
        
        DB::table('attachments')->insert([

            'id' => 1,
            'title' => 'Annexure',    
            'file_name' => '1.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '1',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 2,
            'title' => 'Annexure',    
            'file_name' => '2.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '2',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 3,
            'title' => 'Annexure',    
            'file_name' => '3.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '3',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 4,
            'title' => 'Annexure',    
            'file_name' => '4.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '4',     
            'created_at' => now(), 
             
        ]);              
        DB::table('attachments')->insert([

            'id' => 6,
            'title' => 'Annexure',    
            'file_name' => '6.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '6',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 7,
            'title' => 'Annexure',    
            'file_name' => '7.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '7',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 8,
            'title' => 'Annexure',    
            'file_name' => '8.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '8',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 9,
            'title' => 'Annexure',    
            'file_name' => '9.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '9',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 10,
            'title' => 'Annexure',    
            'file_name' => '10.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '10',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 11,
            'title' => 'Annexure',    
            'file_name' => '11.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '11',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 12,
            'title' => 'Annexure',    
            'file_name' => '12.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '12',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 13,
            'title' => 'Annexure',    
            'file_name' => '13.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '13',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 14,
            'title' => 'Annexure',    
            'file_name' => '14.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '14',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 15,
            'title' => 'Annexure',    
            'file_name' => '15.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '1',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '15',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 16,
            'title' => 'Annexure A',    
            'file_name' => '16.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '2',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '16',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 17,
            'title' => 'Annexure A',    
            'file_name' => '17.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '2',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '17',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 18,
            'title' => 'Annexure B',    
            'file_name' => '18.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '3',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '18',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 19,
            'title' => 'Annexure B',    
            'file_name' => '19.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '3',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '19',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 20,
            'title' => 'Annexure C',    
            'file_name' => '20.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '4',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '20',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 21,
            'title' => 'Annexure C',    
            'file_name' => '21.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '4',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '21',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 22,
            'title' => 'Annexure C',    
            'file_name' => '22.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '4',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '22',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 23,
            'title' => 'Annexure D',    
            'file_name' => '23.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '23',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 24,
            'title' => 'Annexure D',    
            'file_name' => '24.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '24',     
            'created_at' => now(), 
             
        ]);
        DB::table('attachments')->insert([

            'id' => 25,
            'title' => 'Annexure D',    
            'file_name' => '25.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '25',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 26,
            'title' => 'Annexure D',    
            'file_name' => '26.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '26',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 27,
            'title' => 'Annexure D',    
            'file_name' => '27.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '27',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 28,
            'title' => 'Annexure D',    
            'file_name' => '28.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '28',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 29,
            'title' => 'Annexure D',    
            'file_name' => '29.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '29',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 30,
            'title' => 'Annexure D',    
            'file_name' => '30.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '30',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 31,
            'title' => 'Annexure D',    
            'file_name' => '31.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '31',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 32,
            'title' => 'Annexure D',    
            'file_name' => '32.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '32',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 33,
            'title' => 'Annexure D',    
            'file_name' => '33.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '33',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 34,
            'title' => 'Annexure D',    
            'file_name' => '34.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '34',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 35,
            'title' => 'Annexure D',    
            'file_name' => '35.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '35',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 36,
            'title' => 'Annexure D',    
            'file_name' => '36.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '36',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 37,
            'title' => 'Annexure D',    
            'file_name' => '37.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '37',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 38,
            'title' => 'Annexure D',    
            'file_name' => '38.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '38',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 39,
            'title' => 'Annexure D',    
            'file_name' => '39.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '39',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 40,
            'title' => 'Annexure D',    
            'file_name' => '40.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '40',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 41,
            'title' => 'Annexure D',    
            'file_name' => '41.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '41',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 42,
            'title' => 'Annexure D',    
            'file_name' => '42.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '5',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '42',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 43,
            'title' => 'Annexure E',    
            'file_name' => '43.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '6',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '43',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 44,
            'title' => 'Annexure F',    
            'file_name' => '44.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '7',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '44',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 45,
            'title' => 'Annexure F',    
            'file_name' => '45.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '7',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '45',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 46,
            'title' => 'Annexure F',    
            'file_name' => '46.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '7',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '46',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 47,
            'title' => 'Annexure F',    
            'file_name' => '47.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '7',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '47',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 48,
            'title' => 'Annexure F',    
            'file_name' => '48.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '7',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '48',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 49,
            'title' => 'Annexure F',    
            'file_name' => '49.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '7',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '49',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 50,
            'title' => 'Annexure F',    
            'file_name' => '50.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '7',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '50',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 51,
            'title' => 'Annexure G',    
            'file_name' => '51.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '8',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '51',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 52,
            'title' => 'Annexure',    
            'file_name' => '52.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '9',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '52',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 53,
            'title' => 'Annexure',    
            'file_name' => '53.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '9',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '53',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 54,
            'title' => 'Annexure',    
            'file_name' => '54.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '10',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '54',     
            'created_at' => now(), 
             
        ]); 
        DB::table('attachments')->insert([

            'id' => 55,
            'title' => 'Annexure',    
            'file_name' => '55.png',  
            'comment' => null,  
            'mime_type' => null,     
            'attachmentable_id' => '10',    
            'attachmentable_type' => 'App\Models\PetitionIndex',  
            'display_order' => '55',     
            'created_at' => now(), 
             
        ]);     
        

    }
}
