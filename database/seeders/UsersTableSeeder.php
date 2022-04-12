<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'id' => 1,
            'owner_name'=> 'ADMIN',
            'surname'=> 'admin',
            'dob'=> null,
            'province_id'=> null,
            'region_id'=> null,
            'city_id'=> null,
            'dog_name'=> null,
            'sex'=> null, //1 is for male      
            'age_month'=> null,
            'age_year'=> null,
            'race_type_id'=> null,
            'relation_race'=> null,
            'pedigree'=> null,
            'particular_detail'=> null,
            'email' => 'admin@admin.com',
            'profile_image'=> '',
            'owner_detail'=> null,
            'dog_detail'=> null,                         
            'password' => bcrypt('test1234'),
            'approval_status' => 1,
        ]);        
    }
}
