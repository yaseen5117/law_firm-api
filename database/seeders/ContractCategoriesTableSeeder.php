<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contract_categories')->truncate();
        DB::table('contract_categories')->insert([
            'title'=>'Category-1',
            'display_order'=>1,
        ]);
        DB::table('contract_categories')->insert([
            'title'=>'Category-2',
            'display_order'=>2,
        ]);
        DB::table('contract_categories')->insert([
            'title'=>'Category-3',
            'display_order'=>3,
        ]);
        DB::table('contract_categories')->insert([
            'title'=>'Category-4',
            'display_order'=>4,
        ]);
        DB::table('contract_categories')->insert([
            'title'=>'Category-5',
            'display_order'=>5,
        ]);
    }
}
