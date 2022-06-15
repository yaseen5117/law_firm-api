<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSheetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petition_module_types')->truncate();
        DB::table('petition_module_types')->insert([
            'title' => 'Relist',
            'module_id' => 1        
        ]);    
        DB::table('petition_module_types')->insert([
            'title' => 'Comments submitted',
            'module_id' => 1             
        ]);    
        DB::table('petition_module_types')->insert([
            'title' => 'Arguments',
            'module_id' => 1                          
        ]);    
        DB::table('petition_module_types')->insert([
            'title' => 'Part-heard',
            'module_id' => 1                          
        ]);    
        DB::table('petition_module_types')->insert([
            'title' => 'As interim Bail',
            'module_id' => 1                         
        ]);   
        //////////
        DB::table('petition_module_types')->insert([
            'title' => 'Dismissed',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Allowed',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'PoA filed',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Final Arguments',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Wait for Orders',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Ad interim granted',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => '7/11 Filed',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => '7/11 Decided',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'WS filed',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Issues Framed',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'PWs',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'DWs',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => '1/10 Moved',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => '1/10 Decided',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Challan filed',
            'module_id' => 1                      
        ]);
        ////////
        DB::table('petition_module_types')->insert([
            'title' => 'Charge framed',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Quashment Moved',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Quashment Decided',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => '342 Statement',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Convicted',
            'module_id' => 1                      
        ]);
        DB::table('petition_module_types')->insert([
            'title' => 'Acquitted',
            'module_id' => 1                      
        ]);        
    }
}
