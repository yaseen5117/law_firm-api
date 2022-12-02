<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimitationCalculatorCaseQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('limitation_calculator_case_questions')->truncate();
        DB::table('limitation_calculator_case_questions')->insert([
            'id' => 1,
            'limitation_calculator_case_id' => 1,
            'question' => 'What kind of appeal are you filing?',
            'display_order' => 1
        ]);
        DB::table('limitation_calculator_case_questions')->insert([
            'id' => 2,
            'limitation_calculator_case_id' => 2,
            'question' => 'What kind of Application are you filing?',
            'display_order' => 2
        ]);
        DB::table('limitation_calculator_case_questions')->insert([
            'id' => 3,
            'limitation_calculator_case_id' => 3,
            'question' => 'What kind of review are you filing?',
            'display_order' => 3
        ]);
        DB::table('limitation_calculator_case_questions')->insert([
            'id' => 4,
            'limitation_calculator_case_id' => 4,
            'question' => 'What kind of revision are you filing?',
            'display_order' => 4
        ]);
        DB::table('limitation_calculator_case_questions')->insert([
            'id' => 5,
            'limitation_calculator_case_id' => 5,
            'question' => 'What kind of Suit are you filing?',
            'display_order' => 5
        ]);
    }
}
