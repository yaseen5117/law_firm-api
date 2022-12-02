<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimitationCalculatorCaseSubAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('limitation_calculator_case_sub_answers')->truncate();
        //A150 appeal START
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 1,
            'sub_answer' => 'What was the date of the sentence?',
            'date_field_label' => 'Challenging Date',
            'days' => 7,
            'display_order' => 1
        ]);
        //A151
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 2,
            'sub_answer' => 'What was the date of the decree or order?',
            'date_field_label' => 'Challenging Date',
            'days' => 20,
            'display_order' => 2
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 2,
            'sub_answer' => 'On what date did you apply for a copy of decree or order?',
            'date_field_label' => 'Order Date',
            'days' => 20,
            'display_order' => 3
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 2,
            'sub_answer' => 'On what date was the certified copy of the decree or order prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 20,
            'display_order' => 4
        ]);
        //A152
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 3,
            'sub_answer' => 'What was the date of the decree or order appealed from?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 5
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 3,
            'sub_answer' => 'On what date did you apply for a decree or order appealed from?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 6
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 3,
            'sub_answer' => 'On what date was the certified copy of the decree or order appealed from prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 7
        ]);
        //A156
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 7,
            'sub_answer' => 'What was the date of the decree or order appealed from?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 8
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 7,
            'sub_answer' => 'On what date did you apply for a decree or order appealed from?',
            'date_field_label' => 'Order Date',
            'days' => 90,
            'display_order' => 9
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 7,
            'sub_answer' => 'On what date was the certified copy of the decree or order appealed from prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 90,
            'display_order' => 10
        ]);
        //A153
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 4,
            'sub_answer' => 'What was the date of the  order?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 11
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 4,
            'sub_answer' => 'On what date did you apply for a copy of order?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 12
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 4,
            'sub_answer' => 'On what date was the certified copy of the order prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 13
        ]);
        //A154
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 5,
            'sub_answer' => 'What was the date of the order appealed from?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 14
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 5,
            'sub_answer' => 'On what date did you apply for a copy of order appealed from?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 15
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 5,
            'sub_answer' => 'On what date was the certified copy of the order appealed from prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 16
        ]);
        //A155
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 6,
            'sub_answer' => 'What was the date of the order appealed from?',
            'date_field_label' => 'Challenging Date',
            'days' => 60,
            'display_order' => 17
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 6,
            'sub_answer' => 'On what date did you apply for a copy of order appealed from?',
            'date_field_label' => 'Order Date',
            'days' => 60,
            'display_order' => 18
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 6,
            'sub_answer' => 'On what date was the certified copy of the order appealed from prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 60,
            'display_order' => 19
        ]);
        //A157
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 8,
            'sub_answer' => 'What was the date of the order appealed from?',
            'date_field_label' => 'Challenging Date',
            'days' => 180,
            'display_order' => 20
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 8,
            'sub_answer' => 'On what date did you apply for a copy of order appealed from?',
            'date_field_label' => 'Order Date',
            'days' => 180,
            'display_order' => 21
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 8,
            'sub_answer' => 'On what date was the certified copy of the order appealed from prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 180,
            'display_order' => 22
        ]);
        //A158
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 9,
            'sub_answer' => 'What was the date of the order appealed from?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 20
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 9,
            'sub_answer' => 'On what date did you apply for a copy of order appealed from?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 21
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 9,
            'sub_answer' => 'On what date was the certified copy of the order appealed from prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 22
        ]);
        //appeal END

        //A158 Application START
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 10,
            'sub_answer' => 'When the summons was served?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 23
        ]);

        //A159
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 11,
            'sub_answer' => 'When the notice of the filing was served?',
            'date_field_label' => 'Challenging Date',
            'days' => 10,
            'display_order' => 24
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 11,
            'sub_answer' => 'When the application of the certified copy of notice was served?',
            'date_field_label' => 'Order Date',
            'days' => 10,
            'display_order' => 25
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 11,
            'sub_answer' => 'When the copy was prepared?',
            'date_field_label' => 'Prepared Date',
            'days' => 10,
            'display_order' => 26
        ]);

        //A160
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 12,
            'sub_answer' => 'When the copy was prepared?',
            'date_field_label' => 'Challenging Date',
            'days' => 15,
            'display_order' => 27
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 12,
            'sub_answer' => 'When the application of the certified copy of notice was served?',
            'date_field_label' => 'Order Date',
            'days' => 15,
            'display_order' => 28
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 12,
            'sub_answer' => 'When the preparation of the copy was intmated?',
            'date_field_label' => 'Prepared Date',
            'days' => 15,
            'display_order' => 29
        ]);

        //A163 
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 15,
            'sub_answer' => 'When the dismissal order was passed',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 30
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 15,
            'sub_answer' => 'When the copy or the decree or order was passed?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 31
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 15,
            'sub_answer' => 'When the copy or the decree or order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 32
        ]);

        //A164 
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 16,
            'sub_answer' => 'when the date of decree was passed or when the applicant got the knowledge?',
            'date_field_label' => 'Challenging Date',
            'days' => 60,
            'display_order' => 33
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 16,
            'sub_answer' => 'When the copy or the decree or order was passed?',
            'date_field_label' => 'Order Date',
            'days' => 60,
            'display_order' => 34
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 16,
            'sub_answer' => 'When the copy or the decree or order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 60,
            'display_order' => 35
        ]);

        //A165
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 17,
            'sub_answer' => 'When the applicant was dispossessed?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 36
        ]);

        //A166
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 18,
            'sub_answer' => 'When the sale was executed?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 37
        ]);

        //A167
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 19,
            'sub_answer' => 'When the obstruction was caused?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 38
        ]);

        //A168
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 20,
            'sub_answer' => 'When the application was dismissed?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 39
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 20,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 40
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 20,
            'sub_answer' => 'When preparation of the copy was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 41
        ]);

        //A169
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 21,
            'sub_answer' => 'The date of decree in application or when the applicant acquired knowledge of the decree where the notice of application was not served?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 42
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 21,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 43
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 21,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 44
        ]);

        //A170
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 22,
            'sub_answer' => 'When the decree was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 45
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 22,
            'sub_answer' => 'When the copy was decree applied for?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 46
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 22,
            'sub_answer' => 'When preparation of the copy was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 47
        ]);

        //A171
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 23,
            'sub_answer' => 'When the order of the judgment was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 60,
            'display_order' => 48
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 23,
            'sub_answer' => 'When the copy was order applied for?',
            'date_field_label' => 'Order Date',
            'days' => 60,
            'display_order' => 49
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 23,
            'sub_answer' => 'When the copy or the decree or order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 60,
            'display_order' => 50
        ]);

        //A172 
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 24,
            'sub_answer' => 'When the dismissal order was passed',
            'date_field_label' => 'Challenging Date',
            'days' => 60,
            'display_order' => 51
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 24,
            'sub_answer' => 'When the copy or the decree or order was passed?',
            'date_field_label' => 'Order Date',
            'days' => 60,
            'display_order' => 52
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 24,
            'sub_answer' => 'When the copy or the decree or order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 60,
            'display_order' => 53
        ]);

        //A174
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 26,
            'sub_answer' => 'When the payment or adjustment was made?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 54
        ]);
        //A175
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 27,
            'sub_answer' => 'When the decree was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 182,
            'display_order' => 55
        ]);

        //A176
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 28,
            'sub_answer' => 'When did plaintive or applicative die?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 56
        ]);

        //A177
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 29,
            'sub_answer' => 'When did the defendant or respondent die?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 57
        ]);

        //A178
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 30,
            'sub_answer' => 'When the notice of making the award was served?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 58
        ]);

        //A179
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 31,
            'sub_answer' => 'When the decree was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 59
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 31,
            'sub_answer' => 'When the copy or the decree was passed?',
            'date_field_label' => 'Order Date',
            'days' => 90,
            'display_order' => 60
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 31,
            'sub_answer' => 'When the copy or the decree was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 90,
            'display_order' => 61
        ]);

        //A181
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 32,
            'sub_answer' => 'When did the sale become absolute?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 62
        ]);

        //A181
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 33,
            'sub_answer' => 'When the right to apply acquired?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 63
        ]);

        //A183
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 34,
            'sub_answer' => 'When the right to inforce the judgment, decree or order acquired?',
            'date_field_label' => 'Challenging Date',
            'days' => 2190,
            'display_order' => 64
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 34,
            'sub_answer' => 'When the copy or the decree was passed?',
            'date_field_label' => 'Order Date',
            'days' => 2190,
            'display_order' => 65
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 34,
            'sub_answer' => 'When the copy or the decree was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 2190,
            'display_order' => 66
        ]);
        //Application END

        //Review SATRT
        //R161
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 35,
            'sub_answer' => 'When the decree was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 15,
            'display_order' => 67
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 35,
            'sub_answer' => 'When the copy or the decree or order was passed?',
            'date_field_label' => 'Order Date',
            'days' => 15,
            'display_order' => 68
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 35,
            'sub_answer' => 'When the copy or the decree or order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 15,
            'display_order' => 69
        ]);

        //R162
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 36,
            'sub_answer' => 'When the decree was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 20,
            'display_order' => 70
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 36,
            'sub_answer' => 'When the copy or the decree or order was passed?',
            'date_field_label' => 'Order Date',
            'days' => 20,
            'display_order' => 71
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 36,
            'sub_answer' => 'When the copy or the decree or order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 20,
            'display_order' => 72
        ]);

        //R173
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 37,
            'sub_answer' => 'When the decree or order was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 73
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 37,
            'sub_answer' => 'When the copy or the decree or order was passed?',
            'date_field_label' => 'Order Date',
            'days' => 90,
            'display_order' => 74
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 37,
            'sub_answer' => 'When the copy or the decree or order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 90,
            'display_order' => 75
        ]);
        //Review END

        //Revision START
        //R90
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 38,
            'sub_answer' => 'Date of decree or order?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 76
        ]);
        //Revision END

        //Suit START
        //S1    
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 39,
            'sub_answer' => 'When the notice of the award was delivered to plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 30,
            'display_order' => 77
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 39,
            'sub_answer' => 'When the cop is applied for?',
            'date_field_label' => 'Order Date',
            'days' => 30,
            'display_order' => 78
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 39,
            'sub_answer' => 'When the preparation of the copy was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 30,
            'display_order' => 79
        ]);

        //S2
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 40,
            'sub_answer' => 'When did the act or omission take place?',
            'date_field_label' => 'Challenging Date',
            'days' => 90,
            'display_order' => 80
        ]);

        //S3
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 41,
            'sub_answer' => 'When did the disposition occur?',
            'date_field_label' => 'Challenging Date',
            'days' => 182,
            'display_order' => 81
        ]);

        //S5
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 42,
            'sub_answer' => 'When did the date or liquated demand become payable or the property become recoverable?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 82
        ]);

        //S6
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 43,
            'sub_answer' => 'When was the penalty or forfeiture incurred?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 83
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 43,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 84
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 43,
            'sub_answer' => 'When the  preparation of the copy was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 365,
            'display_order' => 85
        ]);

        //S7
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 44,
            'sub_answer' => 'When the wages accrued due?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 86
        ]);

        //S8
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 45,
            'sub_answer' => 'When was the food or drink delivered?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 87
        ]);

        //S9
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 46,
            'sub_answer' => 'When did the price become payable?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 88
        ]);

        //S10
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 47,
            'sub_answer' => 'When did the purchaser take the physical position of the property sold?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 89
        ]);

        //S11
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 48,
            'sub_answer' => 'When was the order passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 90
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 48,
            'sub_answer' => 'When the copy is applied for?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 91
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 48,
            'sub_answer' => 'When did the copy of the preparation was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 365,
            'display_order' => 92
        ]);

        //S11A
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 49,
            'sub_answer' => 'When was the order passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 93
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 49,
            'sub_answer' => 'When the copy is applied for?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 94
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 49,
            'sub_answer' => 'When did the copy of the preparation was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 365,
            'display_order' => 95
        ]);

        //S12
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 50,
            'sub_answer' => 'When the sale was confirmed or became final?',
            'date_field_label' => 'Challenging Date',
            'days' => 2190,
            'display_order' => 96
        ]);

        //S13
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 51,
            'sub_answer' => 'When was decision order was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 97
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 51,
            'sub_answer' => 'When the copy is applied for?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 98
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 51,
            'sub_answer' => 'When did the copy of the preparation was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 365,
            'display_order' => 99
        ]);

        //S14
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 52,
            'sub_answer' => 'When the act or order was passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 100
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 52,
            'sub_answer' => 'When the same was broad into the knowledge of plaintive?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 101
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 52,
            'sub_answer' => 'When the copy of order was intimated to the plaintive?',
            'date_field_label' => 'Prepared Date',
            'days' => 365,
            'display_order' => 102
        ]);

        //S15
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 53,
            'sub_answer' => 'When was the attachment, lease of attachment made?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 103
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 53,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 104
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 53,
            'sub_answer' => 'When the copy of order was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 365,
            'display_order' => 105
        ]);

        //S16
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 54,
            'sub_answer' => 'When was the payment made?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 106
        ]);

        //S17
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 55,
            'sub_answer' => 'When was the payment made?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 107
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 55,
            'sub_answer' => 'When the order was intimated to the plaintive?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 108
        ]);

        //S18
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 56,
            'sub_answer' => 'When did the impressment end?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 109
        ]);

        //S21
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 59,
            'sub_answer' => 'When was the person killed?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 110
        ]);

        //S22
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 60,
            'sub_answer' => 'When was the injure committed?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 111
        ]);

        //S23
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 61,
            'sub_answer' => 'When was the plaintive acquitted or prosecution was terminated?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 112
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 61,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 113
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 61,
            'sub_answer' => 'When the copy of preparation was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 365,
            'display_order' => 114
        ]);

        //S24
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 62,
            'sub_answer' => 'When was liable published?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 115
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 62,
            'sub_answer' => 'When the same came into the knowledge of the plaintive?',
            'date_field_label' => 'Order Date',
            'days' => 365,
            'display_order' => 116
        ]);

        //S25
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 63,
            'sub_answer' => 'When were the word spoken? When same came into the knowledge of plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 117
        ]);

        //S26
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 64,
            'sub_answer' => 'When did the last occur?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 118
        ]);

        //S27
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 65,
            'sub_answer' => 'When was breach the contract?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 119
        ]);

        //S28
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 66,
            'sub_answer' => 'When did the distract occur?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 120
        ]);

        //S29
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 67,
            'sub_answer' => 'When did the seizer happened?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 121
        ]);

        //S30
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 68,
            'sub_answer' => 'When did the loss or injure occur?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 122
        ]);

        //S31
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 69,
            'sub_answer' => 'When the goods are to be delivered?',
            'date_field_label' => 'Challenging Date',
            'days' => 365,
            'display_order' => 123
        ]);

        //S32
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 70,
            'sub_answer' => 'When did the perversion first become known to the person known by?',
            'date_field_label' => 'Challenging Date',
            'days' => 730,
            'display_order' => 124
        ]);

        //S33
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 71,
            'sub_answer' => 'When was the wrong complain done?',
            'date_field_label' => 'Challenging Date',
            'days' => 730,
            'display_order' => 125
        ]);

        //S34
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 72,
            'sub_answer' => 'When was the wrong complain done?',
            'date_field_label' => 'Challenging Date',
            'days' => 730,
            'display_order' => 126
        ]);

        //S36
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 74,
            'sub_answer' => 'When did the male-fiction , miss-fiction or nonfiction take place?',
            'date_field_label' => 'Challenging Date',
            'days' => 730,
            'display_order' => 127
        ]);

        //S37
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 75,
            'sub_answer' => 'When did the obstruction occur?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 128
        ]);

        //S38
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 76,
            'sub_answer' => 'When was the water diverted?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 129
        ]);

        //S39
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 77,
            'sub_answer' => 'When was test passed.?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 130
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 77,
            'sub_answer' => 'When the test passed to knowledge of the plaintive.',
            'date_field_label' => 'Order Date',
            'days' => 1095,
            'display_order' => 131
        ]);

        //S40
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 78,
            'sub_answer' => 'When did the infringement occur?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 132
        ]);

        //S41
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 79,
            'sub_answer' => 'When did the waste began?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 133
        ]);

        //S42
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 81095,
            'sub_answer' => 'When did the injection sassed?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 134
        ]);

        //S43
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 81,
            'sub_answer' => 'When was the payment made or distributed?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 135
        ]);

        //S44
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 82,
            'sub_answer' => 'When did the ward attain majority?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 136
        ]);

        //S47
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 83,
            'sub_answer' => 'When was the final order passed?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 137
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 83,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 1095,
            'display_order' => 138
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 83,
            'sub_answer' => 'When the copy of preparation was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 1095,
            'display_order' => 139
        ]);

        //S48
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 84,
            'sub_answer' => 'When the palatine got knowledge who’s position the property is?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 140
        ]);

        //S48A
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 85,
            'sub_answer' => 'When did the sale become known to plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 141
        ]);

        //S48B
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 86,
            'sub_answer' => 'When did the sale become known to plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 142
        ]);

        //S49
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 87,
            'sub_answer' => 'When was the property wrong fully taken?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 143
        ]);

        //S50
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 88,
            'sub_answer' => 'When did the hire became payable?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 144
        ]);

        //S51
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 89,
            'sub_answer' => 'When the goods were to be delivered?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 145
        ]);

        //S52
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 90,
            'sub_answer' => 'When the goods were delivered?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 146
        ]);

        //S53
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 91,
            'sub_answer' => 'When did the period of credit expired?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 147
        ]);

        //S54
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 92,
            'sub_answer' => 'When did the period of the propose elapse?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 148
        ]);

        //S55
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 93,
            'sub_answer' => 'When did the sale take place?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 149
        ]);

        //S56
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 94,
            'sub_answer' => 'When was the work done?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 150
        ]);

        //S57
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 95,
            'sub_answer' => 'When  was the loan paid?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 151
        ]);

        //S58
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 96,
            'sub_answer' => 'When was the checked paid?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 152
        ]);

        //S59
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 97,
            'sub_answer' => 'When was the loan made?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 153
        ]);

        //S60
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 98,
            'sub_answer' => 'When was the demand made?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 154
        ]);

        //S61
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 99,
            'sub_answer' => 'When was the money paid?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 155
        ]);

        //S62
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 100,
            'sub_answer' => 'When was the money received?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 156
        ]);

        //S63
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 101,
            'sub_answer' => 'When did interest become due?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 157
        ]);

        //S64
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 102,
            'sub_answer' => 'When were the accounts stated in -writing signed?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 158
        ]);
        //S64A
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 103,
            'sub_answer' => 'When did the debt become payable?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 159
        ]);

        //S65
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 104,
            'sub_answer' => 'When did the time specified arrived or the contingence happen?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 160
        ]);

        //S66
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 105,
            'sub_answer' => 'What day was specified?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 161
        ]);

        //S67
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 106,
            'sub_answer' => 'When was the bound executed?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 162
        ]);

        //S68
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 107,
            'sub_answer' => 'When was the condition broken?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 163
        ]);

        //S69
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 108,
            'sub_answer' => 'When did the bill or note fall due?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 164
        ]);

        //S70
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 109,
            'sub_answer' => 'When was the bill presented?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 165
        ]);

        //S71
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 110,
            'sub_answer' => 'When was the bill present at that place?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 166
        ]);

        //S72
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 111,
            'sub_answer' => 'When was the fixed time expired?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 167
        ]);

        //S73
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 112,
            'sub_answer' => 'The date of the bill of the note?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 168
        ]);

        //S74
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 113,
            'sub_answer' => 'When was the first term of the payment expired?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 169
        ]);

        //S75
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 114,
            'sub_answer' => 'When was the default made?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 170
        ]);

        //S76
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 115,
            'sub_answer' => 'When was the delivery made to payee?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 171
        ]);

        //S77
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 116,
            'sub_answer' => 'When was the notice given?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 172
        ]);

        //S78
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 117,
            'sub_answer' => 'When was the refusal made to accept?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 173
        ]);

        //S79
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 118,
            'sub_answer' => 'When did the accepter  pay the amount of  the bill?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 174
        ]);

        //S80
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 119,
            'sub_answer' => 'When did the surety pay the creditor?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 175
        ]);

        //S81
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 120,
            'sub_answer' => 'When did the surety pay anything in access of his own share?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 176
        ]);

        //S83
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 122,
            'sub_answer' => 'When was the plaintive actually indemnified?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 177
        ]);

        //S84
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 123,
            'sub_answer' => 'When was the suit or business terminated?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 178
        ]);

        //S85
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 124,
            'sub_answer' => 'will add?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 179
        ]);

        //S86
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 125,
            'sub_answer' => 'When did the decease die?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 180
        ]);

        //S86B
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 126,
            'sub_answer' => 'When did causing the loss occur?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 181
        ]);

        //S87
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 127,
            'sub_answer' => 'When did the insurers elect to avoid the policy?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 182
        ]);

        //S88
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 128,
            'sub_answer' => 'When was the account demanded and refused?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 183
        ]);

        //S89
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 129,
            'sub_answer' => 'When was the account demanded and refused?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 184
        ]);

        //S90
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 130,
            'sub_answer' => 'When did the neglect or misconduct become known to the plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 185
        ]);

        //S91
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 131,
            'sub_answer' => 'When  did the facts become known to plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 186
        ]);

        //S92
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 132,
            'sub_answer' => 'When did the issue or registration become known to the plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 187
        ]);

        //S93
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 133,
            'sub_answer' => 'When was the attempt made?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 188
        ]);

        //S94
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 134,
            'sub_answer' => 'When was the plaintive restore to the sanity and accrued knowledge of convince?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 189
        ]);

        //S95
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 135,
            'sub_answer' => 'When did the fraud become known to the party wronged?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 190
        ]);

        //S96
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 136,
            'sub_answer' => 'When did the mistake become known to the plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 191
        ]);

        //S97
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 137,
            'sub_answer' => 'The date of the failure?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 192
        ]);

        //S98
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 138,
            'sub_answer' => 'When did the trusty died?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 193
        ]);

        //S99
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 139,
            'sub_answer' => 'When did the plaintive make payment in access?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 194
        ]);

        //S100
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 140,
            'sub_answer' => 'When did the right to the contribution accrued?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 195
        ]);

        //S101
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 141,
            'sub_answer' => 'What was the end date of voyage?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 196
        ]);

        //S102
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 142,
            'sub_answer' => 'When did the wages accrue due?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 197
        ]);

        //S103
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 143,
            'sub_answer' => 'When was the dower demanded and refused or when was the marriage dissolve by death or divorce?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 198
        ]);

        //S104
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 144,
            'sub_answer' => 'when was the marriage dissolve by death or divorce?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 199
        ]);

        //S105
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 145,
            'sub_answer' => 'When did the mortgager enter on mortgage property?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 200
        ]);

        //S106
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 146,
            'sub_answer' => 'Date of dissolution?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 201
        ]);

        //S107
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 147,
            'sub_answer' => 'Date of payment?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 202
        ]);

        //S108
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 148,
            'sub_answer' => 'When were the tresses cut out?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 203
        ]);

        //S109
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 149,
            'sub_answer' => 'When were the profit received?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 204
        ]);

        //S110
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 150,
            'sub_answer' => 'When did the arrears become due?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 205
        ]);

        //S111
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 151,
            'sub_answer' => 'What was the time fixed for completing the sale or date of acceptance?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 206
        ]);

        //S112
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 152,
            'sub_answer' => 'When was call payable?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 207
        ]);

        //S113
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 153,
            'sub_answer' => 'Which date was fixed for the performance?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 208
        ]);

        //S114
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 154,
            'sub_answer' => 'When did the facts become known to the plaintiff?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 209
        ]);

        //S115
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 155,
            'sub_answer' => 'When was the contract broken or when did the breach of the contract ceases?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 210
        ]);

        //S116
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 156,
            'sub_answer' => '',
            'date_field_label' => '',
            'days' => 2190,
            'display_order' => 210
        ]);

        //S117
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 157,
            'sub_answer' => 'What was the date of judgment?',
            'date_field_label' => 'Challenging Date',
            'days' => 2190,
            'display_order' => 211
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 157,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 2190,
            'display_order' => 212
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 157,
            'sub_answer' => 'When the copy of preparation was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 2190,
            'display_order' => 213
        ]);

        //S118
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 158,
            'sub_answer' => 'When did the edge adoption become known to the plaintiff?',
            'date_field_label' => 'Challenging Date',
            'days' => 2190,
            'display_order' => 214
        ]);

        //S119
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 159,
            'sub_answer' => 'When were the right of the adopted son interfered?',
            'date_field_label' => 'Challenging Date',
            'days' => 2190,
            'display_order' => 215
        ]);

        //S120
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 160,
            'sub_answer' => 'When did right accrues?',
            'date_field_label' => 'Challenging Date',
            'days' => 2190,
            'display_order' => 216
        ]);

        //S121
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 161,
            'sub_answer' => 'When did the sale become final and exclusive?',
            'date_field_label' => 'Challenging Date',
            'days' => 1095,
            'display_order' => 217
        ]);

        //S122
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 162,
            'sub_answer' => 'What was the date of the judgment of recognizes?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 218
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 162,
            'sub_answer' => 'When the copy was applied for?',
            'date_field_label' => 'Order Date',
            'days' => 4380,
            'display_order' => 219
        ]);
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 162,
            'sub_answer' => 'When the copy of preparation was intimated?',
            'date_field_label' => 'Prepared Date',
            'days' => 4380,
            'display_order' => 220
        ]);

        //S123
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 163,
            'sub_answer' => 'When did the legacy or share become payable or deliverable?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 221
        ]);

        //S124
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 164,
            'sub_answer' => 'When did the defendant take position to the office adversely to the plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 222
        ]);

        //S125
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 165,
            'sub_answer' => 'What was the date of alienation?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 223
        ]);

        //S126
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 166,
            'sub_answer' => 'When alliance take position of the property?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 224
        ]);

        //S127
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 167,
            'sub_answer' => 'When did the exclusion become known to the plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 225
        ]);

        //S128
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 168,
            'sub_answer' => 'When were the arrears become payable?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 226
        ]);

        //S129
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 169,
            'sub_answer' => 'When was the right denied?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 227
        ]);

        //S130
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 170,
            'sub_answer' => 'When did the right to resume or access the land first accrued?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 228
        ]);

        //S131
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 171,
            'sub_answer' => 'When was the plaintive first refused the enjoyment of the right?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 229
        ]);

        //S132
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 172,
            'sub_answer' => 'When did the money sued for become due?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 230
        ]);

        //S134
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 173,
            'sub_answer' => 'When did the transfer became known to plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 231
        ]);

        //S134A
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 174,
            'sub_answer' => 'When did the transfer become known to plaintive?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 232
        ]);

        //S134B
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 175,
            'sub_answer' => 'When was the death, reorganization or removal of the transfer?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 233
        ]);

        //S134C
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 176,
            'sub_answer' => 'When was the death, reorganization or removal of the seller?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 234
        ]);

        //S135
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 177,
            'sub_answer' => 'When did the mortgage’s rights to position determent?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 235
        ]);

        //S136
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 178,
            'sub_answer' => 'When was the vender first entitle to possession?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 236
        ]);

        //S137
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 179,
            'sub_answer' => 'When was the judgement debtor first entitle to possession?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 237
        ]);

        //S138
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 180,
            'sub_answer' => 'What was date when the sale become absolute?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 238
        ]);

        //S139
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 181,
            'sub_answer' => 'When was the tenancy determined?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 239
        ]);

        //S140
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 182,
            'sub_answer' => 'When did his estate falls into possession?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 240
        ]);

        //S141
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 183,
            'sub_answer' => 'When did the female died?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 241
        ]);

        //S142
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 184,
            'sub_answer' => 'What was the date of discontinuance or dispossession?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 242
        ]);

        //S143
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 185,
            'sub_answer' => 'When the forfeiture, incurred or the condition was broken?',
            'date_field_label' => 'Challenging Date',
            'days' => 4380,
            'display_order' => 243
        ]);

        //S145
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 186,
            'sub_answer' => 'What was the date of position or pawn?',
            'date_field_label' => 'Challenging Date',
            'days' => 10950,
            'display_order' => 244
        ]);

        //S146
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 187,
            'sub_answer' => 'When was any part of to the principle of interest last paid on account of the mortgage-bit?',
            'date_field_label' => 'Challenging Date',
            'days' => 10950,
            'display_order' => 245
        ]);

        //S146A
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 188,
            'sub_answer' => 'What was the date of dispossession or discontinuance?',
            'date_field_label' => 'Challenging Date',
            'days' => 10950,
            'display_order' => 246
        ]);

        //S147
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 189,
            'sub_answer' => 'When did the money secured by the mortgage become due?',
            'date_field_label' => 'Challenging Date',
            'days' => 21900,
            'display_order' => 247
        ]);

        //S148
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 190,
            'sub_answer' => 'When did the right to redeem are to recover or position accrued?',
            'date_field_label' => 'Challenging Date',
            'days' => 21900,
            'display_order' => 248
        ]);

        //S149
        DB::table('limitation_calculator_case_sub_answers')->insert([
            'limitation_calculator_answer_id' => 191,
            'sub_answer' => 'When would the period of limitation begin to run under this act against a like suit by a private person?',
            'date_field_label' => 'Challenging Date',
            'days' => 21900,
            'display_order' => 249
        ]);
    }
}
