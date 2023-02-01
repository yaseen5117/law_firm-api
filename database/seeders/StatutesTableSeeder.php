<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statutes')->truncate();
        DB::table('statutes')->insert([
            'id' => 1,
            'title' => 'Pakistan Penal Code, 1860',
            'display_order' => 1,

        ]);
        DB::table('statutes')->insert([
            'id' => 2,
            'title' => 'Anti-Terrorism Act, 1997',
            'display_order' => 2,

        ]);
        DB::table('statutes')->insert([
            'id' => 3,
            'title' => 'Prevention of Electronic Crimes Act, 2016',
            'display_order' => 3,

        ]);
        DB::table('statutes')->insert([
            'id' => 4,
            'title' => 'Control of Narcotic Substances Act, 1997',
            'display_order' => 4,

        ]);
        DB::table('statutes')->insert([
            'id' => 5,
            'title' => 'Maintenance of Public Order Ordinance, 1960',
            'display_order' => 5,

        ]);
        DB::table('statutes')->insert([
            'id' => 6,
            'title' => 'Prevention of Corruption Act, 1947',
            'display_order' => 6,

        ]);
    }
}
