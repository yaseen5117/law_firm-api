<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimitationCalculatorCasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('limitation_calculator_cases')->truncate();
        DB::table('limitation_calculator_cases')->insert([
            'id' => 1,
            'title' => 'Appeal',
            'display_order' => 1
        ]);
        DB::table('limitation_calculator_cases')->insert([
            'id' => 2,
            'title' => 'Application',
            'display_order' => 2
        ]);
        DB::table('limitation_calculator_cases')->insert([
            'id' => 3,
            'title' => 'Review',
            'display_order' => 3
        ]);
        DB::table('limitation_calculator_cases')->insert([
            'id' => 4,
            'title' => 'Revision',
            'display_order' => 4
        ]);
        DB::table('limitation_calculator_cases')->insert([
            'id' => 5,
            'title' => 'Suit',
            'display_order' => 5
        ]);
    }
}
