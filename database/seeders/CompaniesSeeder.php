<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();
        Company::create([
            'id' => 2,
            'name' => 'QC'
        ]);
    }
}
