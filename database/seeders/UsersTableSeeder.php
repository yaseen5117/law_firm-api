<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('password_resets')->truncate();
        DB::table('users')->insert([
            'company_id' => Company::first()->id,
            'name' => 'QC Admin',
            'email' => 'admin@qc.com',
            'profile_image' => '',
            'is_approved' => 1,
            'password' => bcrypt('test1234'),

        ]);
    }
}
