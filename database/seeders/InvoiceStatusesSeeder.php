<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    }
}
