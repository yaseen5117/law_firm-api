<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SupportServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_services')->truncate();

			DB::table('support_services')->insert([
				'title' => 'Mailgun',
				'company_id' => '74',
                'display_order' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			]);

			DB::table('support_services')->insert([
				'title' => 'Twillio',
                'company_id' => '74',
                'display_order' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			]);

			DB::table('support_services')->insert([
				'title' => 'Gateway',
                'company_id' => '74',
                'display_order' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			]);

    }
}
