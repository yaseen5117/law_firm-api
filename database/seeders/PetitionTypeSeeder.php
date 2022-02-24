<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PetitionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petition_types')->truncate();
        DB::table('petition_types')->insert(
            [
                'id' => 1,
                'title' => 'Writ Petition',
                'display_order' => '1',
            ]
        );
        DB::table('petition_types')->insert([
            'id' => 2,
            'title' => 'Criminal Miscelleneous',
            'display_order' => '2',
        ]);
        DB::table('petition_types')->insert([
            'id' => 3,
            'title' => 'Civil Revision',
            'display_order' => '3',
        ]);
        DB::table('petition_types')->insert([
            'id' => 4,
            'title' => 'Regular First Appeal',
            'display_order' => '4',
        ]);
        DB::table('petition_types')->insert([
            'id' => 5,
            'title' => 'First Appeal Against Order',
            'display_order' => '5',
        ]);

        DB::table('petition_types')->insert([
            'id' => 6,
            'title' => 'Criminal Appeal',
            'display_order' => '6',
        ]);
        DB::table('petition_types')->insert([
            'id' => 7,
            'title' => 'Criminal Revision',
            'display_order' => '7',
        ]);
        DB::table('petition_types')->insert([
            'id' => 8,
            'title' => 'Murder Reference',
            'display_order' => '8',
        ]);
        DB::table('petition_types')->insert([
            'id' => 9,
            'title' => 'Petition For Special Leave To Appeal',
            'display_order' => '9',
        ]);

        DB::table('petition_types')->insert([
            'id' => 10,
            'title' => 'Diary Number',
            'display_order' => '10',
        ]);
        DB::table('petition_types')->insert([
            'id' => 11,
            'title' => 'Intra Court Appeal',
            'display_order' => '11',
        ]);
        DB::table('petition_types')->insert([
            'id' => 12,
            'title' => 'Review Application',
            'display_order' => '12',
        ]);
        DB::table('petition_types')->insert([
            'id' => 13,
            'title' => 'Review Application',
            'display_order' => '13',
        ]);

        DB::table('petition_types')->insert([
            'id' => 14,
            'title' => 'Civil Suit',
            'display_order' => '14',
        ]);
        DB::table('petition_types')->insert([
            'id' => 15,
            'title' => 'Labour Appeal',
            'display_order' => '15',
        ]);
        DB::table('petition_types')->insert([
            'id' => 16,
            'title' => 'Arbitration Petition',
            'display_order' => '16',
        ]);
        DB::table('petition_types')->insert([
            'id' => 17,
            'title' => 'Companies Original',
            'display_order' => '17',
        ]);

        DB::table('petition_types')->insert([
            'id' => 18,
            'title' => 'Execution Petition',
            'display_order' => '18',
        ]);
        DB::table('petition_types')->insert([
            'id' => 19,
            'title' => 'Human Rights Petition',
            'display_order' => '19',
        ]);
        DB::table('petition_types')->insert([
            'id' => 20,
            'title' => 'Election Petition',
            'display_order' => '20',
        ]);
        DB::table('petition_types')->insert([
            'id' => 21,
            'title' => 'Suo Moto',
            'display_order' => '21',
        ]);

        DB::table('petition_types')->insert([
            'id' => 22,
            'title' => 'Tax Reference',
            'display_order' => '22',
        ]);
        DB::table('petition_types')->insert([
            'id' => 23,
            'title' => 'Regular Second Appeal',
            'display_order' => '23',
        ]);
        DB::table('petition_types')->insert([
            'id' => 24,
            'title' => 'Second Appeal Against Order',
            'display_order' => '24',
        ]);
        DB::table('petition_types')->insert([
            'id' => 25,
            'title' => 'Transfer Application',
            'display_order' => '25',
        ]);

        DB::table('petition_types')->insert([
            'id' => 26,
            'title' => 'Civil Original Suit',
            'display_order' => '26',
        ]);
        DB::table('petition_types')->insert([
            'id' => 27,
            'title' => 'Execution First Appeal',
            'display_order' => '27',
        ]);
        DB::table('petition_types')->insert([
            'id' => 28,
            'title' => 'Petition For Leave To Appear And Defend',
            'display_order' => '28',
        ]);
        DB::table('petition_types')->insert([
            'id' => 29,
            'title' => 'Execution Second Appeal',
            'display_order' => '29',
        ]);

        DB::table('petition_types')->insert([
            'id' => 30,
            'title' => 'Tax Appeal',
            'display_order' => '30',
        ]);
        DB::table('petition_types')->insert([
            'id' => 31,
            'title' => 'Custom Reference',
            'display_order' => '31',
        ]);
        DB::table('petition_types')->insert([
            'id' => 32,
            'title' => 'Civil Reference',
            'display_order' => '32',
        ]);
        DB::table('petition_types')->insert([
            'id' => 33,
            'title' => 'Cm Independent',
            'display_order' => '33',
        ]);

        DB::table('petition_types')->insert([
            'id' => 34,
            'title' => 'Wealth Tax Appeal',
            'display_order' => '34',
        ]);
        DB::table('petition_types')->insert([
            'id' => 35,
            'title' => 'Commercial Appeal',
            'display_order' => '35',
        ]);
        DB::table('petition_types')->insert([
            'id' => 36,
            'title' => 'Jail Appeal',
            'display_order' => '36',
        ]);
        DB::table('petition_types')->insert([
            'id' => 37,
            'title' => 'Capital Sentence Reference',
            'display_order' => '37',
        ]);

        DB::table('petition_types')->insert([
            'id' => 38,
            'title' => 'Federal Excise & Reference Application',
            'display_order' => '38',
        ]);
        DB::table('petition_types')->insert([
            'id' => 39,
            'title' => 'Sales Tax Reference',
            'display_order' => '39',
        ]);
        DB::table('petition_types')->insert([
            'id' => 40,
            'title' => 'Income Tax Reference',
            'display_order' => '40',
        ]);
        DB::table('petition_types')->insert([
            'id' => 41,
            'title' => 'Sales Tax Appeal',
            'display_order' => '41',
        ]);

        DB::table('petition_types')->insert([
            'id' => 42,
            'title' => 'Income Tax Appeal',
            'display_order' => '42',
        ]);
        DB::table('petition_types')->insert([
            'id' => 43,
            'title' => 'Custom Appeal',
            'display_order' => '43',
        ]);
        DB::table('petition_types')->insert([
            'id' => 44,
            'title' => 'C.T.R',
            'display_order' => '44',
        ]);
        DB::table('petition_types')->insert([
            'id' => 45,
            'title' => 'Objection Case',
            'display_order' => '45',
        ]);

        DB::table('petition_types')->insert([
            'id' => 46,
            'title' => 'Office Objection',
            'display_order' => '46',
        ]);
        DB::table('petition_types')->insert([
            'id' => 47,
            'title' => 'Criminal Original',
            'display_order' => '47',
        ]);
        DB::table('petition_types')->insert([
            'id' => 48,
            'title' => 'Succession Appeal',
            'display_order' => '48',
        ]);
        DB::table('petition_types')->insert([
            'id' => 49,
            'title' => 'Objection Petition',
            'display_order' => '49',
        ]);

        DB::table('petition_types')->insert([
            'id' => 50,
            'title' => 'Cross Objection',
            'display_order' => '50',
        ]);
        DB::table('petition_types')->insert([
            'id' => 51,
            'title' => 'Secp Appeal',
            'display_order' => '51',
        ]);
        DB::table('petition_types')->insert([
            'id' => 52,
            'title' => 'Judicial Reference',
            'display_order' => '52',
        ]);
        DB::table('petition_types')->insert([
            'id' => 53,
            'title' => 'Ogra Application',
            'display_order' => '53',
        ]);

        DB::table('petition_types')->insert([
            'id' => 54,
            'title' => 'Consumer Appeal',
            'display_order' => '54',
        ]);
        DB::table('petition_types')->insert([
            'id' => 55,
            'title' => 'Judicial Service Appeal',
            'display_order' => '55',
        ]);
        DB::table('petition_types')->insert([
            'id' => 56,
            'title' => 'Auqaf Appeal',
            'display_order' => '56',
        ]);
        DB::table('petition_types')->insert([
            'id' => 57,
            'title' => 'Election Appeal',
            'display_order' => '57',
        ]);

        DB::table('petition_types')->insert([
            'id' => 58,
            'title' => 'Criminal Original Case',
            'display_order' => '58',
        ]);
        DB::table('petition_types')->insert([
            'id' => 59,
            'title' => 'Civil Miscellaneous Appeals',
            'display_order' => '59',
        ]);
        DB::table('petition_types')->insert([
            'id' => 60,
            'title' => 'Miscellaneous Petitions',
            'display_order' => '60',
        ]);
        DB::table('petition_types')->insert([
            'id' => 61,
            'title' => 'Enforcement Petition',
            'display_order' => '61',
        ]);
        DB::table('petition_types')->insert([
            'id' => 62,
            'title' => 'Complaint',
            'display_order' => '62',
        ]);
    }
}
