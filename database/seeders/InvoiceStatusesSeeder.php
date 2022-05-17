<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InvoiceStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_statuses')->truncate();
        DB::table('invoice_statuses')->insert([
            'title'=>'Draft',
        ]);
        DB::table('invoice_statuses')->insert([
            'title'=>'Sent',
        ]);
        DB::table('invoice_statuses')->insert([
            'title'=>'Paid ',
        ]);
    }
}
